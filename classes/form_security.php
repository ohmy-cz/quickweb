<?php
  class formSecurity
  { 
    //Here we store the generated form key
    private $formKey;
     
    //Here we store the old form key (more info at step 4)
    private $old_formKey;
   
    //The constructor stores the form key (if one exists) in our class variable.
    function __construct()
    {
      //We need the previous key so we store it
      if(isset($_SESSION['form_key']))
      {
          $this->old_formKey = $_SESSION['form_key'];
      }
    }
      
    //Function to generate the form key
    private function generateKey()
    {
      //Get the IP-address of the user
      $ip = $_SERVER['REMOTE_ADDR'];
       
      //We use mt_rand() instead of rand() because it is better for generating random numbers.
      //We use 'true' to get a longer string.
      $uniqid = uniqid(mt_rand(), true);
       
      //Return the hash
      return md5($ip . $uniqid);
    }
    
    //Function to output the form key
    public function outputKey()
    {
      //Generate the key and store it inside the class
      $this->formKey = $this->generateKey();
      //Store the form key in the session
      $_SESSION['form_key'] = $this->formKey;
       
      //Output the form key
      return $this->formKey;
    }
    
    //Function that validated the form key POST data
    public function validate($key)
    {
      //We use the old formKey and not the new generated version
      if($key == $this->old_formKey)
      {
        //The key is valid, return true.
        return true;
      }
      else
      {
        //The key is invalid, return false.
        return false;
      }
    }
  }