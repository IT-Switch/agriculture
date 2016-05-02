<?php ob_start();
$config = array(
                 'login' => array(
                                    array(
                                            'field' => 'username',
                                            'label' => 'User Id',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required'
                                         ),
                                    ),
                 'forgotpassword' => array(
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'required|valid_email'
                                         ),
                                    ),
                 'add_user_insert' => array(
                                    array(
                                            'field' => 'name',
                                            'label' => 'Username',
                                            'rules' => 'required|callback_unique_name'
                                         ),
                                    array(
                                            'field' => 'mail',
                                            'label' => 'Email',
                                            'rules' => 'required|valid_email|callback_unique_email'
                                         ),
                                    array(
                                            'field' => 'pass',
                                            'label' => 'Password',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'cpass',
                                            'label' => 'Confirm password',
                                            'rules' => 'matches[pass]',
                                         ),
                                  
                                    array(
                                            'field' => 'contact',
                                            'label' => 'Contact',
                                            'rules' => 'required'
                                         ),
                                    ),
                 'edit_user_advertiser_details' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'Title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'fname',
                                            'label' => 'First Name',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'lname',
                                            'label' => 'Last Name',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'address',
                                            'label' => 'Address',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'town_village',
                                            'label' => 'Town/Village',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'country',
                                            'label' => 'Country',
                                            'rules' => 'required'
                                         ),
                                    ),
				 'edit_account_details' => array(
                                    array(
                                            'field' => 'user_name',
                                            'label' => 'User Name',
                                            'rules' => 'required|callback_unique_name'
                                         ),
									array(
                                            'field' => 'email_id',
                                            'label' => 'Email Address',
                                            'rules' => 'required|valid_email|callback_unique_email'
                                         ),	 
                                    array(
                                            'field' => 'contact',
                                            'label' => 'Contact',
                                            'rules' => 'required',
                                         ),
                                    ),
				 'edit_account_details_short' => array(
									array(
                                            'field' => 'mail',
                                            'label' => 'Email Address',
                                            'rules' => 'required|valid_email|callback_unique_email'
                                         ),	 
                                    array(
                                            'field' => 'cpass',
                                            'label' => 'Confirm password',
                                            'rules' => 'matches[pass]',
                                         ),
                                    ),
                 'add_edit_category' => array(
                                    array(
                                            'field' => 'cat_name',
                                            'label' => 'Categroy title',
                                            'rules' => 'required'
                                         ),							
                                    ),
                 'add_edit_directorycategory' => array(
                                    array(
                                            'field' => 'cat_name',
                                            'label' => 'Directory Categroy title',
                                            'rules' => 'required'
                                         ),							
                                    ),
				 'add_edit_advicecategory' => array(
                                    array(
                                            'field' => 'cat_name',
                                            'label' => 'Directory Categroy title',
                                            'rules' => 'required'
                                         ),							
                                    ),
				 'add_edit_amenity' => array(
                                    array(
                                            'field' => 'amenities',
                                            'label' => 'Amenity title',
                                            'rules' => 'required'
                                         ),							
                                    ),
				 'add_edit_page' => array(
                                    array(
                                            'field' => 'page_name',
                                            'label' => 'Page title',
                                            'rules' => 'required'
                                         ),							
                                    ),					
                 'add_edit_banner' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'Title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'link',
                                            'label' => 'Link',
                                            'rules' => 'required|url'
                                         ),
                                    array(
                                            'field' => 'page_id',
                                            'label' => 'Page',
                                            'rules' => 'required'
                                         ),
                                    ),
                 'add_edit_featured_property' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'Title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'link',
                                            'label' => 'Link',
                                            'rules' => 'required|url'
                                         ),
                                    ),
                 'add_edit_advertisement' => array(
                                    array(
                                            'field' => 'section',
                                            'label' => 'Section',
                                            'rules' => 'required'
                                         ),
                                   /* array(
                                            'field' => 'ad_type',
                                            'label' => 'Advertisement Type',
                                            'rules' => 'required'
                                         ),*/
                                    ),
                 'add_edit_hotdeal' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'Title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'link',
                                            'label' => 'Link',
                                            'rules' => 'required|url'
                                         ),
                                    array(
                                            'field' => 'description',
                                            'label' => 'Description',
                                            'rules' => 'required|url'
                                         ),
                                    ),
				 'add_edit_properties_rent' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'lang:PROPERTY_TITLE',
                                            'rules' => 'required'
                                         ),
                                  
									array(
                                            'field' => 'price',
                                            'label' => 'lang:RENT_PER_MONTH',
                                            'rules' => 'required'
                                         ),	 
                                    array(
                                            'field' => 'state',
                                            'label' => 'lang:DISTRICT',
                                            'rules' => 'required',
                                         ),
                                    array(
                                            'field' => 'city',
                                            'label' => 'lang:TOWN',
                                            'rules' => 'required',
                                         ),
                                    ),
				 'add_edit_properties_sale' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'lang:PROPERTY_TITLE',
                                            'rules' => 'required'
                                         ),
                                   
									array(
                                            'field' => 'price',
                                            'label' => 'lang:PRICE',
                                            'rules' => 'required'
                                         ),	 
                                    array(
                                            'field' => 'state',
                                            'label' => 'lang:DISTRICT',
                                            'rules' => 'required',
                                         ),
                                    array(
                                            'field' => 'city',
                                            'label' => 'lang:TOWN',
                                            'rules' => 'required',
                                         ),
									
                                  
                                    ),
				 'add_edit_properties_wanted_sale' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'lang:PROPERTY_TITLE',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'price',
                                            'label' => 'lang:PRICE',
                                            'rules' => 'required'
                                         ),	 
                                    array(
                                            'field' => 'state',
                                            'label' => 'lang:DISTRICT',
                                            'rules' => 'required',
                                         ),
                                    array(
                                            'field' => 'city',
                                            'label' => 'lang:TOWN',
                                            'rules' => 'required',
                                         ),
                                    ),
				 'add_edit_properties_wanted_rent' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'lang:PROPERTY_TITLE',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'price',
                                            'label' => 'lang:RENT_PER_MONTH',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'state',
                                            'label' => 'lang:DISTRICT',
                                            'rules' => 'required',
                                         ),
                                    array(
                                            'field' => 'city',
                                            'label' => 'lang:TOWN',
                                            'rules' => 'required',
                                         ),
                                    ),
				 'add_edit_properties_holiday' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'lang:PROPERTY_TITLE',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'title_fr',
                                            'label' => 'lang:PROPERTY_TITLE_FR',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'price',
                                            'label' => 'lang:RENT_PER_NIGHT',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'state',
                                            'label' => 'lang:DISTRICT',
                                            'rules' => 'required',
                                         ),
                                    array(
                                            'field' => 'city',
                                            'label' => 'lang:TOWN',
                                            'rules' => 'required',
                                         ),
									
                                    array(
                                            'field' => 'property_description',
                                            'label' => 'lang:PROPERTY_DESCRIPTION',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'property_description_fr',
                                            'label' => 'lang:PROPERTY_DESCRIPTION_FR',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'telephone',
                                            'label' => 'lang:TELEPHONE',
                                            'rules' => 'regex_match[/^[0-9.-]+$/]'
                                         ),
                                    array(
                                            'field' => 'website_url',
                                            'label' => 'lang:WEBSITE_URL',
                                            'rules' => 'callback_valid_url_format'
                                         ),
                                    array(
                                            'field' => 'video_url',
                                            'label' => 'lang:VIDEO',
                                            'rules' => 'callback_valid_url_format'
                                         ),
                                    ),
				 'add_edit_directory' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'Bussiness Name',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'category',
                                            'label' => 'Category',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'description',
                                            'label' => 'Description',
                                            'rules' => 'required'
                                         ),
									/*array(
                                            'field' => 'address_1',
                                            'label' => 'Address Line 1',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'address_2',
                                            'label' => 'Address Line 2',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'state',
                                            'label' => 'District',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'city',
                                            'label' => 'Town',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'phone',
                                            'label' => 'Telephone',
                                            'rules' => 'required'
                                         ),*/
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'required|valid_email'
                                         ),
                                    array(
                                            'field' => 'TELEPHONE',
                                            'label' => 'lang:TELEPHONE',
                                            'rules' => 'regex_match[/^[0-9.-]+$/]'
                                         ),
                                    ),
				 'add_edit_foreign_ownership' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'Title',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'description',
                                            'label' => 'Description',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'concept',
                                            'label' => 'Concept',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'facilities',
                                            'label' => 'Facilities',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'category',
                                            'label' => 'Category',
                                            'rules' => 'required'
                                         ),
									/*array(
                                            'field' => 'address',
                                            'label' => 'Address',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'phone',
                                            'label' => 'Telephone',
                                            'rules' => 'required'
                                         ),
                                    /*array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'required|valid_email'
                                         ),*/
                                    ),
				 'add_edit_news' => array(
                                    array(
                                            'field' => 'news_title',
                                            'label' => 'News Title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'date',
                                            'label' => 'Date',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'description',
                                            'label' => 'News Description',
                                            'rules' => 'required'
                                         ),
                                    ),
				 'add_edit_subscribers' => array(
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'required|valid_email|callback_unique_email_subscriber'
                                         ),
                                    ),
				 'add_edit_newsletters' => array(
                                    array(
                                            'field' => 'subject',
                                            'label' => 'Subject',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'description',
                                            'label' => 'Description',
                                            'rules' => 'required'
                                         ),
                                    ),
				 'add_edit_package' => array(
                                    array(
                                            'field' => 'package_name',
                                            'label' => 'Package name',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'price',
                                            'label' => 'Price',
                                            'rules' => 'required|valid_number'
                                         ),
                                    array(
                                            'field' => 'no_of_post',
                                            'label' => 'Number of post',
                                            'rules' => 'required|valid_number'
                                         ),
                                    ),	
				 'add_edit_advice' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'Title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'description',
                                            'label' => 'Description',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'category',
                                            'label' => 'Category',
                                            'rules' => 'required'
                                         ),
                                    ),	
				 'contact_user_submit' => array(
                                    array(
                                            'field' => 'subject',
                                            'label' => 'Subject',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'message',
                                            'label' => 'Message',
                                            'rules' => 'required'
                                         ),
                                    ),	
				 'sitesetting_submit' => array(
                                    array(
                                            'field' => 'footer_text_title',
                                            'label' => 'Footer text title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'footer_text',
                                            'label' => 'Footer text',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'abused_report',
                                            'label' => 'Number of abused report',
                                            'rules' => 'required'
                                         ),
                                    /*array(
                                            'field' => 'default_duration_ads_for_individual_users',
                                            'label' => 'Default duration of Ads for individual users',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'default_duration_ads_for_agency',
                                            'label' => 'Default duration of Ads for agencies',
                                            'rules' => 'required'
                                         ),*/
                                    ),	
				 'add_edit_blockip' => array(
                                    array(
                                            'field' => 'blockip',
                                            'label' => 'IP',
                                            'rules' => 'required'
                                         ),
                                    ),	
				 'add_edit_paymentsnotfication' => array(
                                    array(
                                            'field' => 'due_days',
                                            'label' => 'Days',
                                            'rules' => 'required|valid_number'
                                         ),
                                    array(
                                            'field' => 'subject',
                                            'label' => 'Subject',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'content',
                                            'label' => 'Content',
                                            'rules' => 'required'
                                         ),
                                    ),	
				 'add_edit_questions' => array(
                                    array(
                                            'field' => 'question_title',
                                            'label' => 'Question Title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'question',
                                            'label' => 'Question',
                                            'rules' => 'required'
                                         ),
                                    ),	
				 'add_edit_answers' => array(
                                    array(
                                            'field' => 'answer',
                                            'label' => 'Answer',
                                            'rules' => 'required'
                                         ),
                                    ),	
				 
				 /*front end validations*/
				 
                 'login_submit' => array(
                                    array(
                                            'field' => 'uname',
                                            'label' => 'lang:YOUR_EMAIL',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'pass',
                                            'label' => 'lang:PASSWORD',
                                            'rules' => 'required'
                                         ),
                                    ),
				 'signup' => array(
                                    array(
                                            'field' => 'name',
                                            'label' => 'lang:DESIRED_USERNAME',
                                            'rules' => 'required|callback_unique_name'
                                         ),
                                    array(
                                            'field' => 'mail',
                                            'label' => 'lang:EMAIL_ID',
                                            'rules' => 'required|valid_email|callback_unique_email'
                                         ),
                                    array(
                                            'field' => 'fname',
                                            'label' => 'lang:F_NAME',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'lname',
                                            'label' => 'lang:L_NAME',
                                            'rules' => 'required'
                                         ),

                                    ),
				 'signup_ag' => array(
                                    array(
                                            'field' => 'company_ag',
                                            'label' => 'lang:COMPANY_NAME',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'mail_ag',
                                            'label' => 'lang:EMAIL_ID',
                                            'rules' => 'required|valid_email|callback_unique_email'
                                         ),
                                    array(
                                            'field' => 'title_ag',
                                            'label' => 'lang:TITLE',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'fname_ag',
                                            'label' => 'lang:F_NAME',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'lname_ag',
                                            'label' => 'lang:L_NAME',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'address_ag',
                                            'label' => 'lang:ADDRESS',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'town_village_ag',
                                            'label' => 'lang:TOWN_VILLAGE',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'country_ag',
                                            'label' => 'lang:COUNTRY',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'brn',
                                            'label' => 'lang:BRN',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'vat',
                                            'label' => 'lang:VAT',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'agree_terms_ag',
                                            'label' => 'lang:TERMS_OF_USE',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'math_ques_ag',
                                            'label' => 'lang:MATHS_QUES',
                                            'rules' => 'required'
                                         ),
                                    ),
                 'edit_user_advertiser_details_front' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'lang:TITLE',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'fname',
                                            'label' => 'lang:F_NAME',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'lname',
                                            'label' => 'lang:L_NAME',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'address',
                                            'label' => 'lang:ADDRESS',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'town_village',
                                            'label' => 'lang:TOWN_VILLAGE',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'country',
                                            'label' => 'lang:COUNTRY',
                                            'rules' => 'required'
                                         ),
                                    ),
				 'edit_account_details_front' => array(
									array(
                                            'field' => 'mail',
                                            'label' => 'lang:EMAIL_ADDRESS',
                                            'rules' => 'required|valid_email|callback_unique_email'
                                         ),	 
                                    array(
                                            'field' => 'cpass',
                                            'label' => 'lang:CONFIRM_PASSWORD',
                                            'rules' => 'matches[pass]',
                                         ),
                                    ),
				 'edit_agency_account_details_front' => array(
									array(
                                            'field' => 'mail',
                                            'label' => 'lang:EMAIL_ADDRESS',
                                            'rules' => 'required|valid_email|callback_unique_email'
                                         ),	 
                                    array(
                                            'field' => 'cpass',
                                            'label' => 'lang:CONFIRM_PASSWORD',
                                            'rules' => 'matches[pass]',
                                         ),
                                    array(
                                            'field' => 'telephone',
                                            'label' => 'lang:TELEPHONE',
                                            'rules' => 'regex_match[/^[0-9.-]+$/]'
                                         ),
                                    array(
                                            'field' => 'website_url',
                                            'label' => 'lang:WEBSITE_URL',
                                            'rules' => 'callback_valid_url_format'
                                         ),
                                    ),
                 'contact_us' => array(
                                    array(
                                            'field' => 'from_user_name',
                                            'label' => 'lang:YOUR_NAME',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'from_user_email',
                                            'label' => 'lang:EMAIL_ID',
                                            'rules' => 'required|valid_email'
                                         ),
                                    array(
                                            'field' => 'phone',
                                            'label' => 'lang:PHONE_NUMBER',
                                            'rules' => 'required|regex_match[/^[0-9.-]+$/]'
                                         ),
                                    array(
                                            'field' => 'subject',
                                            'label' => 'lang:SUBJECT',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'message',
                                            'label' => 'lang:MESSAG',
                                            'rules' => 'required'
                                         ),
                                    ),
                 'invite_friend' => array(
                                    array(
                                            'field' => 'freind_email',
                                            'label' => 'lang:FRIENDS_EMAIL_ADDRESS',
                                            'rules' => 'required|valid_email'
                                         ),
                                    array(
                                            'field' => 'subject',
                                            'label' => 'lang:SUBJECT',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'message',
                                            'label' => 'lang:MESSAGE',
                                            'rules' => 'required'
                                         ),
                                    ),
                 'advertise_with_us' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'lang:TITLE',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'fname',
                                            'label' => 'lang:F_NAME',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'lname',
                                            'label' => 'lang:L_NAME',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'mail',
                                            'label' => 'lang:EMAIL_ADDRESS',
                                            'rules' => 'required|valid_email'
                                         ),
                                    array(
                                            'field' => 'interested_in',
                                            'label' => 'lang:INTERESTED_IN',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'message',
                                            'label' => 'lang:YOUR_ENQUIRY',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'company_name',
                                            'label' => 'lang:COMPANY_NAME',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'phone_office',
                                            'label' => 'lang:TEL_OFFICE',
                                            'rules' => 'regex_match[/^[0-9.-]+$/]'
                                         ),
                                    array(
                                            'field' => 'mobile',
                                            'label' => 'lang:TEL_MOBILE',
                                            'rules' => 'required|regex_match[/^[0-9.-]+$/]'
                                         ),
                                    array(
                                            'field' => 'math_ques',
                                            'label' => 'lang:MATHS_QUES',
                                            'rules' => 'required'
                                         ),
                                    ),
                 'contact_advertiser' => array(
                                    array(
                                            'field' => 'from_user_name',
                                            'label' => 'lang:YOUR_NAME',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'from_user_email',
                                            'label' => 'lang:YOUR_EMAIL',
                                            'rules' => 'required|valid_email'
                                         ),
                                    array(
                                            'field' => 'phone',
                                            'label' => 'lang:PHONE_NUMBER',
                                            'rules' => 'required|valid_number'
                                         ),
                                    array(
                                            'field' => 'message',
                                            'label' => 'lang:MSG_TO_ADVERTISER',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'math_ques',
                                            'label' => 'lang:MATHS_QUES',
                                            'rules' => 'required'
                                         ),
                                    ),
                 'post_question' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'lang:TITLE',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'question',
                                            'label' => 'lang:QUESTION',
                                            'rules' => 'required'
                                         ),
                                    ),
                 'post_answer' => array(
                                    array(
                                            'field' => 'comment',
                                            'label' => 'lang:COMMENT',
                                            'rules' => 'required'
                                         ),
                                    ),
				 'add_directory' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => 'lang:BUSSINESS_NAME',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'category',
                                            'label' => 'lang:CATEGORY',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'description',
                                            'label' => 'lang:DESCRIPTION',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'address_1',
                                            'label' => 'lang:ADD_LINE_1',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'address_2',
                                            'label' => 'lang:ADD_LINE_2',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'state',
                                            'label' => 'lang:DISTRICT',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'city',
                                            'label' => 'lang:TOWN',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'phone',
                                            'label' => 'lang:TELEPHONE',
                                            'rules' => 'required|regex_match[/^[0-9.-]+$/]'
                                         ),
									array(
                                            'field' => 'fax',
                                            'label' => 'lang:FAX',
                                            'rules' => 'regex_match[/^[0-9.-]+$/]'
                                         ),
                                    array(
                                            'field' => 'website',
                                            'label' => 'lang:WEBSITE',
                                            'rules' => 'callback_valid_url_format'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'lang:EMAIL',
                                            'rules' => 'required|valid_email'
                                         ),
                                    ),
				 'add_edit_state' => array(
                                    array(
                                            'field' => 'state_name',
                                            'label' => 'State name',
                                            'rules' => 'required'
                                         ),							
                                    ),
			 'add_edit_city' => array(
                                    array(
                                            'field' => 'state_id',
                                            'label' => 'State name',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'city_name',
                                            'label' => 'City name',
                                            'rules' => 'required'
                                         ),							
                                    ),
								
			);
?>			   