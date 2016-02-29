<?php
class Ldap extends AppModel {
	public $useDbConfig = 'ldap';
	public $primaryKey = 'uid';
	public $useTable = 'ou=users';
	public $userModel = 'Ldap';

	public function buildUserdata($user,$uid) {
		$ldap_user_data = $user[0][$this->userModel];		
		$user_data = array(
			'id' => '15', #<--- noch anpassen !!!!!!!!! 
			'username' => $uid,//$ldap_user_data['givenname'].' '.$ldap_user_data['sn'],
			'group_id' => '6',
			'Group' =>array(
				'id' => '6',
				'name' => 'LdapGroup',
				'created'=>'2013-01-11 14:36:14',
				'modified'=>'2013-01-11 14:39:16'
			)
		);
		return $user_data;
	}

	function login($uid, $password){
		$this->_loggedIn = false;
		$dn = $this->getDn('uid', $uid);
		$loginResult = $this->ldapauth($dn, $password); 
		if( $loginResult == 1){
			$this->_loggedIn = true;
			$user = $this->find('all', array('scope'=>'base', 'targetDn'=>$dn));
			$user_data = $this->buildUserdata($user,$uid);
			return $user_data;
		}
        else {
			$this->loginError =  $loginResult;
		}
                return $this->_loggedIn;
	}

	function ldapauth($dn, $password){
		$authResult =  $this->auth( array('dn'=>$dn, 'password'=>$password));
		return $authResult;
	}

	function getDn( $attr, $query) {
		$dn = 'uid='.$query.',ou=users,ou=Benutzerverwaltung,ou=Computer- und Medienservice,o=Humboldt-Universitaet zu Berlin,c=DE';
		return $dn;
	}

    function isUser($uid){
        App::uses('ConnectionManager', 'Model');
        $dataSource = ConnectionManager::getDataSource('ldap');
        $ldap = ldap_connect($dataSource->config['host'],$dataSource->config['port']);
        $response = ldap_search($ldap,$dataSource->config['basedn'],'uid='.$uid);
        $entries = ldap_get_entries($ldap,$response);

        if($entries['count'] === 1) {
            $isUser = true;
        }
        else {
            $isUser = false;
        }
        ldap_close($ldap);
        return $isUser;
    }
}
?>