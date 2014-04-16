<?php
//require_once 'mysql.php'; // include this file so we can use the Mysql Class inside this class as well.

class Account
{
    // In this class we'll have a few variables to be used by the class.
    var $mysql; // the mysql variable that will hold the Mysql Object.

    public function __construct()
    {
        $this->mysql = new Mysql(); // Connect to mysql and the database so we can use it.
    }
    // This function does what it says, it gets all of the current news records from the db.
    public function getUserSuperduper($level)
    {
        $rset = $this->mysql->select('*',"co_account a,co_parameter b","b.id=a.level and b.groups='akun' and a.level>$level ","acc_id ASC");
        return $rset;
	}
	public function getUserSuper()
    {
        $rset = $this->mysql->select('*',"infaccount","");
        return $rset;
    }

	public function getUserAcces($iduser)
    {
        $rset = $this->mysql->select('*',"infaccount_access","acc_id='$iduser'");
        return $rset;
    }
    public function getAkunById($id)
    {
        $rset = $this->mysql->select('*',"co_account","acc_id='$id'");
        return $rset;
    }
	    public function getAkunAccesById($id)
    {
        $rset = $this->mysql->select('*',"co_account_access","acc_id='$id'");
        return $rset;
    }
	    public function getAkunByNama($nama)
    {
        $rset = $this->mysql->select('*',"co_account","acc_user='$nama'");
        return $rset;
    }
	public function getParameterByLevel($group,$id)
    {
        $rset = $this->mysql->select('*',"co_parameter","name='$id' and groups='$group' and id!='1'");
        return $rset;
    }
    public function getRekananWhere($ref)
    {
        $rset = $this->mysql->select('*',"infrekanan","la_ref='$ref'");
        return $rset;
    }
    // Your going to need some way to add and edit your news entries right?
    // well here ya go :P

    // This function will save you lots of time writing out the fields variable everytime.
    public function buildFields($post, $sep=" ") // $post comes in as an array of variables.
    {
        $fields = ""; // This makes sure we don't run into any past fields.
        foreach($post as $key => $value)
        {
            // foreach will take each element of the $post array and seperate
            // each of the values with its key $post[key] = value;
            $value = mysql_escape_string($value); // We'll do a small security check here.
            // I'll explain that in another tutorial. Basically it protect mysql from hackers.
            if($i == 0)
                $fields .= "$key='$value'";
            else
                $fields .= $sep . "$key='$value'";
            // This will create your fields string based on each element in the post array.
            $i++;
        }
        return $fields; // Return the string, $fields.
    }
    public function addUser($post)
    {
        $fields = $this->buildFields($post, ", "); // take the post array and break it into a string.
        if( $this->mysql->insert("co_account",$fields) ) // This is pretty basic. Inserts the new news record.
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	    public function addAccesUser($insert)
    {
        $fields = $this->buildFields($insert, ", "); // take the post array and break it into a string.
        if( $this->mysql->insert("co_account_access",$fields) ) // This is pretty basic. Inserts the new news record.
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    // This function is just the same as addnews, except that it updates an existing record.
    public function editUser($post)
    {
        $fields = $this->buildFields($post, ", ");
        $newsId = $post['acc_id']; 
		//$group=$post['groups'];
        if( $this->mysql->update("co_account",$fields,"acc_id='$newsId'") )
        {
			//print $fields;
            return true; 
        }
        else
        {
            return false;
        }
    }
	    public function editUserAccess($post)
    {
        $fields = $this->buildFields($post, ", ");
        $newsId = $post['acc_id']; 
		//$group=$post['groups'];
        if( $this->mysql->update("co_account_access",$fields,"acc_id='$newsId'") )
        {
			//print $fields;
            return true; 
        }
        else
        {
            return false;
        }
    }

    public function deleteAkun($id)
    {
        if( $this->mysql->delete("co_account","acc_id='$id'"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function deleteAkunAcces($id)
    {
        if( $this->mysql->delete("co_account_access","acc_id='$id'"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
?>
