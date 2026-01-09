<?php
$config = array(
    // Admin
    'Login' => array(
        array(
            'field' => 'role_id',
            'label' => 'Role ID',
            'rules' => 'required|trim'
        ) ,
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim'
        ) ,
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim'
        )
    ) ,
    'ForgotPassword' => array(
        array(
            'field' => 'role_id',
            'label' => 'Role ID',
            'rules' => 'required|trim'
        ) ,
        array(
            'field' => 'mobile',
            'label' => 'Mobile No',
            'rules' => 'required|trim'
        )
    ) ,
    'ChangePassword' => array(
        array(
            'field' => 'opass',
            'label' => 'Current Password',
            'rules' => 'required'
        ) ,
        array(
            'field' => 'npass',
            'label' => 'New Password',
            'rules' => 'required'
        ) ,
        array(
            'field' => 'cpass',
            'label' => 'Confirm Password',
            'rules' => 'required'
        )
    ) ,
   
    'userLogin' => array(
        array(
            'field' => 'mobile',
            'label' => 'Mobile No',
            'rules' => 'required|trim'
        ) ,
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim'
        )
    ) , 
    'ForgotPassword' => array(
        array(
            'field' => 'mobile',
            'label' => 'Mobile No',
            'rules' => 'required|trim'
        )
    ) ,
	'sendMessagecreditcut' => array(
	array(
            'field' => 'user_id',
            'label' => 'User Id',
            'rules' => 'required|trim'
        )
    ) ,
    'Banner' => array(
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'required'
        )
    ) ,
    'Token' => array(
        array(
            'field' => 'userid',
            'label' => 'User ID',
            'rules' => 'required|trim'
        ),array(
            'field' => 'token',
            'label' => 'Token',
            'rules' => 'required|trim'
        )
    ) ,
    'ForgotOTPVerification' => array(
        array(
            'field' => 'mobile',
            'label' => 'Mobile No',
            'rules' => 'required|trim'
        ) ,
        array(
            'field' => 'otp',
            'label' => 'OTP',
            'rules' => 'required|trim'
        )
    ) ,
    'ResetPassword' => array(
        array(
            'field' => 'mobile',
            'label' => 'Mobile No',
            'rules' => 'required|trim'
        ) ,
        array(
            'field' => 'npass',
            'label' => 'New Password',
            'rules' => 'required|trim|min_length[6]'
        ) ,
        array(
            'field' => 'cpass',
            'label' => 'Confirm Password',
            'rules' => 'required|trim|min_length[6]'
        )
    ) ,
    'Logout' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required|trim'
        )
    ) ,

    'Users' => array(
        array(
            'field' => 'name',
            'label' => 'User Name',
            'rules' => 'required|trim'
        ),array(
            'field' => 'language',
            'label' => 'Language',
            'rules' => 'required|trim'
        ),array(
            'field' => 'age',
            'label' => 'Age',
            'rules' => 'required|trim'
        ),array(
            'field' => 'about',
            'label' => 'about',
            'rules' => 'required|trim'
        ),
    ) ,

    'Credit' => array(
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'amount',
            'label' => 'Amount',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'credit',
            'label' => 'Credit',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'discount',
            'label' => 'Discount',
            'rules' => 'required|trim'
        )
    ) ,
	

    //////////////////////////////// APIs //////////////////////////////////
    'Signup' => array(
        array(
            'field' => 'mobile',
            'label' => 'Mobile Number',
            'rules' => 'required|trim|min_length[10]|max_length[10]'
        ),
		array(
            'field' => 'name',
            'label' => 'Student Name',
            'rules' => 'required'
        )
    ) ,
	'Contact' => array(
		array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|trim'
        ),
		array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|trim'
        ),
		array(
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'required|trim'
        ),
		array(
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required'
        )
    ) ,
	'UserProfile' => array(
		array(
            'field' => 'userid',
            'label' => 'User Id',
            'rules' => 'required|trim'
        )
    ) ,
	'verifyotp' => array(
        array(
            'field' => 'mobile',
            'label' => 'Mobile Number',
            'rules' => 'required|trim|min_length[10]|max_length[10]'
        ),
		array(
            'field' => 'otp',
            'label' => 'Otp',
            'rules' => 'required'
        )
    ) ,
	'resendotp' => array(
        array(
            'field' => 'mobile',
            'label' => 'Mobile Number',
            'rules' => 'required|trim|min_length[10]|max_length[10]'
        )
    ) ,
	'GoogleLogin' => array(
        array(
            'field' => 'token',
            'label' => 'Token',
            'rules' => 'required|trim'
        ),array(
            'field' => 'email',
            'label' => 'E-Mail',
            'rules' => 'required|trim'
        ) 
    ) ,
	'Semester' => array(
        array(
            'field' => 'subject_id',
            'label' => 'Subject Id',
            'rules' => 'required|trim'
        ) 
    ) ,
	'JobDetails' => array(
        array(
            'field' => 'jobcategory_id',
            'label' => 'Job Category Id',
            'rules' => 'required|trim'
        ) 
    ) ,
	'Category' => array(
        array(
            'field' => 'subject_id',
            'label' => 'Subject Id',
            'rules' => 'required|trim'
        ),
		array(
            'field' => 'semester_id',
            'label' => 'Semester Id',
            'rules' => 'required|trim'
        )
    ) ,
	'Technology' => array(
        array(
            'field' => 'subject_id',
            'label' => 'Subject Id',
            'rules' => 'required|trim'
        ),
		array(
            'field' => 'semester_id',
            'label' => 'Semester Id',
            'rules' => 'required|trim'
        ),
		array(
            'field' => 'category_id',
            'label' => 'Category Id',
            'rules' => 'required|trim'
        )
    ) ,
	'TechnologyPdf' => array(
        array(
            'field' => 'subject_id',
            'label' => 'Subject Id',
            'rules' => 'required|trim'
        ),
		array(
            'field' => 'semester_id',
            'label' => 'Semester Id',
            'rules' => 'required|trim'
        ),
		array(
            'field' => 'category_id',
            'label' => 'Category Id',
            'rules' => 'required|trim'
        ),
		array(
            'field' => 'technology_id',
            'label' => 'Technology Id',
            'rules' => 'required|trim'
        )
    ) ,
    'MobilePassword' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required'
        ),
        array(
            'field' => 'gender',
            'label' => 'Gender',
            'rules' => 'required'
        ) 
    ) ,
    'OTPVerification' => array(
        array(
            'field' => 'otp',
            'label' => 'OTP',
            'rules' => 'required|trim|min_length[4]|max_length[4]'
        ) ,
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required' 
        )
    ) ,

    
    'Profile' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required'
        )
    ) ,

    'Interests' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required'
        )
    ) ,

    'Feed' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required|trim'
        )
    ) ,

   

    'CompleteProfile' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required'
        ),
        array(
            'field' => 'name',
            'label' => 'Full Name',
            // 'rules' => 'required|trim'
        ) ,
        array(
            'field' => 'age',
            'label' => 'AGE',
            // 'rules' => 'required'
        ) ,
        array(
            'field' => 'gender',
            'label' => 'Gender',
            // 'rules' => 'required'
        ) ,
        array(
            'field' => 'language',
            'label' => 'Language',
            // 'rules' => 'required'
        )
    ) ,

    
    // 'UserLogin' => array(
        // array(
            // 'field' => 'mobile',
            // 'label' => 'mobile',
            // 'rules' => 'required'
        // )
    // ) ,
	'AgentLogin' => array(
        array(
            'field' => 'mobile',
            'label' => 'mobile',
            'rules' => 'required'
        )
    ),
	'UserLogin' => array(
        array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'required|trim'
        )
    ),
    'Addfavourite' => array(
            array(
                'field' => 'user_id',
                'label' => 'User ID',
                'rules' => 'required'
            ), array(
                'field' => 'member_id',
                'label' => 'Member ID',
                'rules' => 'required'
            )
        ) ,

    'UserForgotPassword' => array(
        array(
            'field' => 'email',
            'label' => 'Email Address',
            'rules' => 'required'
        ) 
    ) ,

    'UserResetPassword' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required|trim'
        ) ,
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim|min_length[6]'
        ) ,
    ) ,

    'UserChangePassword' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required|trim'
        ) ,
        array(
            'field' => 'opass',
            'label' => 'Current Password',
            'rules' => 'required'
        ) ,
        array(
            'field' => 'npass',
            'label' => 'New Password',
            'rules' => 'required'
			) ,
    ) ,

    'SendRequest' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required|trim'
        ) ,
        array( 
            'field' => 'member_id',
            'label' => 'Member ID',
            'rules' => 'required'
        )
    ) ,
    'SendMessage' => array(
            array(
                'field' => 'user_id',
                'label' => 'User ID',
                'rules' => 'required|trim'
            ) ,
            array(
                'field' => 'receiver_id',
                'label' => 'Receiver ID',
                'rules' => 'required'
            )
        ) ,
        'MessageSeen' => array(
            array(
                'field' => 'user_id',
                'label' => 'User ID',
                'rules' => 'required|trim'
            ) ,
            array(
                'field' => 'sender_id',
                'label' => 'Sender ID',
                'rules' => 'required'
            )
        ) ,

    'Buycredit' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required|trim'
        ),array(
            'field' => 'credit_id',
            'label' => 'Credit ID',
            'rules' => 'required|trim'
        ) ,array(
            'field' => 'currency',
            'label' => 'Currency ID',
            'rules' => 'required|trim'
        ) 
    ) ,
	'creditkaro' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required|trim'
        ) 
    ) ,
    'OnlineStatus' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID',
            'rules' => 'required|trim'
        ),array(
            'field' => 'is_online',
            'label' => 'Is Online Status',
            'rules' => 'required|trim'
        ) 
    ) ,
    'Notification' => array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required|trim'
        ),array(
            'field' => 'body',
            'label' => 'Body',
            'rules' => 'required|trim'
        ) 
    ) ,
    'GoogleLogin' => array(
        array(
            'field' => 'token',
            'label' => 'Token',
            'rules' => 'required|trim'
        ),array(
            'field' => 'email',
            'label' => 'E-Mail',
            'rules' => 'required|trim'
        ) 
    ) ,
    'UpdateCredit' => array(
        array(
            'field' => 'user_id',
            'label' => 'User ID', 
            'rules' => 'required|trim'
        ),array(
            'field' => 'order_id',
            'label' => 'Order ID',
            'rules' => 'required|trim'
        ),array( 
            'field' => 'txn_status',
            'label' => 'Transaction Status',
            'rules' => 'required|trim'
        ),array(
            'field' => 'bundal',
            'label' => 'Cashfree Bundal',
            'rules' => 'required|trim'
        ),array( 
            'field' => 'txn_status',
            'label' => 'txn_status',
            'rules' => 'required|trim'
        )  
    ) ,
    'StartCall' => array(
        array(
            'field' => 'userid',
            'label' => 'User id',
            'rules' => 'required|trim'
        ),array(
            'field' => 'memberid',
            'label' => 'Member _id',
            'rules' => 'required|trim'
        ) ,array(
            'field' => 'roomid',
            'label' => 'Room id',
            'rules' => 'required|trim'
        ) 
    ) ,
    'EndCall' => array(
        array(
            'field' => 'roomid',
            'label' => 'Room id',
            'rules' => 'required|trim'
        ),array(
            'field' => 'duration',
            'label' => 'Duration',
            'rules' => 'required|trim'
        ) 
    ) ,
    'CheckBallance' => array(
        array(
            'field' => 'userid',
            'label' => 'User id',
            'rules' => 'required|trim'
        ),array(
            'field' => 'memberid',
            'label' => 'Member _id',
            'rules' => 'required|trim'
        )
    ) ,
);

