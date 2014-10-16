<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Session class using native PHP session features and hardened against session fixation.
*
* @package     CodeIgniter
* @subpackage  Libraries
* @category    Sessions
* @author      Dariusz Debowczyk, Matthew Toledo
* @link        http://www.philsbury.co.uk/index.php/blog/code-igniter-sessions/
*/
class CI_Session implements ArrayAccess {

    var $flashdata_key     = 'flash'; // prefix for "flash" variables (eg. flash:new:message)
	 var $object;
	public $userdata = array();

    function CI_Session()
    {
        $this->object =& get_instance();
        log_message('debug', "Native_session Class Initialized");
        $this->_sess_run();

		$this->userdata = $_SESSION;
    }

    function sess_start(){
        $this->_sess_run();
    }
    /**
    * Regenerates session id
    */
    function regenerate_id()
    {
        // copy old session data, including its id
        $old_session_id = session_id();
        $old_session_data = $_SESSION;

        // regenerate session id and store it
        session_regenerate_id();
        $new_session_id = session_id();

        // switch to the old session and destroy its storage
        session_id($old_session_id);
        session_destroy();

        // switch back to the new session id and send the cookie
        session_id($new_session_id);
        @session_start();

        // restore the old session data into the new session
        $_SESSION = $old_session_data;

        // update the session creation time
        $_SESSION['regenerated'] = time();

        // session_write_close() patch based on this thread
        // http://www.codeigniter.com/forums/viewthread/1624/
        // there is a question mark ?? as to side affects

        // end the current session and store session data.
			$this->userdata = $_SESSION;
        session_write_close();
    }

    /**
    * Destroys the session and erases session storage
    */
    function destroy()
    {
        unset($_SESSION);
        if ( isset( $_COOKIE[session_name()] ) )
        {
            setcookie(session_name(), '', time()-42000, '/');
        }
        session_destroy();
    }

    /**
    * Alias for destroy(), makes 1.7.2 happy.
    */
    function sess_destroy()
    {
        $this->destroy();
    }

    /**
    * Reads given session attribute value
    */
    function userdata($item)
    {
        if($item == 'session_id'){ //added for backward-compatibility
            return session_id();
        }else{
            return ( ! isset($_SESSION[$item])) ? false : $_SESSION[$item];
        }
    }
	
/*
	public function __get($name){
		$value = NULL;
		echo $name;
		if($name == "userdata"){
			$value = $this[$name];
		}elseif( isset($this->$name) == TRUE ){
			$value = $this->$name;
		}
		return $value;
	}	
*/
/*
	public function __call ($name, $arguments){
		utils::pre($arguments,0);
		utils::pre($name);
	}
*/
    /**
    * Sets session attributes to the given values
    */
    function set_userdata($newdata = array(), $newval = '')
    {
        if (is_string($newdata))
        {
            $newdata = array($newdata => $newval);
        }

        if (count($newdata) > 0)
        {
            foreach ($newdata as $key => $val)
            {
                $_SESSION[$key] = $val;
            }
        }
			
		$this->userdata = $_SESSION;
    }

    /**
    * Erases given session attributes
    */
    function unset_userdata($newdata = array())
    {
        if(is_string($newdata)){
            if(isset($_SESSION[$newdata])){
                unset($_SESSION[$newdata]);
            }
        }elseif (is_array($newdata))
        {
            foreach ($newdata as $key => $val)
            {
                if(isset($_SESSION[$key]))unset($_SESSION[$key]);
            }
        }

		$this->userdata = $_SESSION;
    }

    /**
    * Starts up the session system for current request
    */
    function _sess_run()
    {
        @session_start();

        $session_id_ttl = $this->object->config->item('sess_expiration');

        if (is_numeric($session_id_ttl))
        {
            if ($session_id_ttl > 0)
            {
                $this->session_id_ttl = $this->object->config->item('sess_expiration');
            }
            else
            {
                $this->session_id_ttl = (60*60*24*365*2);
            }
        }

        // check if session id needs regeneration
        if ( $this->_session_id_expired() )
        {
            // regenerate session id (session data stays the
            // same, but old session storage is destroyed)
            $this->regenerate_id();
        }

        // delete old flashdata (from last request)
        $this->_flashdata_sweep();

        // mark all new flashdata as old (data will be deleted before next request)
        $this->_flashdata_mark();
    }

    /**
    * Checks if session has expired
    */
    function _session_id_expired()
    {
        if ( !isset( $_SESSION['regenerated'] ) )
        {
            $_SESSION['regenerated'] = time();
            return false;
        }

        $expiry_time = time() - $this->session_id_ttl;

        if ( $_SESSION['regenerated'] <=  $expiry_time )
        {
            return true;
        }

        return false;
    }

    /**
    * Sets "flash" data which will be available only in next request (then it will
    * be deleted from session). You can use it to implement "Save succeeded" messages
    * after redirect.
    */
    function set_flashdata($newdata = array(), $newval = '')
    {
        if (is_string($newdata))
        {
            $newdata = array($newdata => $newval);
        }

        if (count($newdata) > 0)
        {
            foreach ($newdata as $key => $val)
            {
                $flashdata_key = $this->flashdata_key.':new:'.$key;
                $this->set_userdata($flashdata_key, $val);
            }
        }
    }


    /**
    * Keeps existing "flash" data available to next request.
    */
    function keep_flashdata($key)
    {
        $old_flashdata_key = $this->flashdata_key.':old:'.$key;
        $value = $this->userdata($old_flashdata_key);

        $new_flashdata_key = $this->flashdata_key.':new:'.$key;
        $this->set_userdata($new_flashdata_key, $value);
    }

    /**
    * Returns "flash" data for the given key.
    */
    function flashdata($key)
    {
        $flashdata_key = $this->flashdata_key.':old:'.$key;
       
        return $this->userdata($flashdata_key);
    }
	
	function new_flashdata($key)
	{
		$flashdata_key = $this->flashdata_key.':new:'.$key;
		
		return $this->userdata($flashdata_key);
	}
	
	function unset_flashdata($key = '')
	{
		if($key != '')
			unset($_SESSION[$this->flashdata_key.':new:'.$key]);
	}

    /**
    * PRIVATE: Internal method - marks "flash" session attributes as 'old'
    */
    function _flashdata_mark()
    {
        foreach ($_SESSION as $name => $value)
        {
            $parts = explode(':new:', $name);
            if (is_array($parts) && count($parts) == 2)
            {
                $new_name = $this->flashdata_key.':old:'.$parts[1];
                $this->set_userdata($new_name, $value);
                $this->unset_userdata($name);
            }
        }
    }

    /**
    * PRIVATE: Internal method - removes "flash" session marked as 'old'
    */
    function _flashdata_sweep()
    {
        foreach ($_SESSION as $name => $value)
        {
            $parts = explode(':old:', $name);
            if (is_array($parts) && count($parts) == 2 && $parts[0] == $this->flashdata_key)
            {
                $this->unset_userdata($name);
            }
        }
    }


	 public function offsetSet($offset, $value) {
//        $this->container[$offset] = $value;
		$this->set_userdata($offset, $value);
    }
    public function offsetExists($offset) {
        return isset($this->userdata[$offset]);
    }
    public function offsetUnset($offset) {
        $this->unset_userdata($offset);
    }
    public function offsetGet($offset) {
			return $this->userdata($offset);
//        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    function all_userdata()
    {
        if(isset($_SESSION)){
            return $_SESSION;
        }else{
            return false;
        }
    }

} 

