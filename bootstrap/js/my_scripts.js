/*
Author: John Gray
Last Revision: 05.05.14
File Name: my_scripts.js
Description: Custom JavaScript for site
Frameworks: jquery 1.11.0
Plug-ins: bootstrap-datepicker.js, bootstrapValidator.js 
*/

$(function() {
	//	Highlights current navigation
	$("#home_public a:contains('Home')").parent().addClass('active');
	$("#home_user a:contains('Home')").parent().addClass('active');
	$("#home_admin a:contains('Home')").parent().addClass('active');
	$("#about a:contains('About')").parent().addClass('active');
	$("#resources a:contains('Resources')").parent().addClass('active');
	$("#log_entry a:contains('Log Entry')").parent().addClass('active');
	$(".user_info a:contains('Logbook')").parent().addClass('active');
	$(".user_profile a:contains('Profile')").parent().addClass('active');
	$(".admin_user a:contains('Edit Users')").parent().addClass('active');
	$(".admin_activities a:contains('Edit Activities')").parent().addClass('active');
	
	// Creates datapicker for forms
	$('.input-group.date').datepicker({
    	format: 'yyyy-mm-dd',
    	endDate: "today",
    	todayHighlight: true
		});
	
	//	Sets United States as default country on countries list
	document.getElementById('countries_list').selectedIndex='232';

/*	Validates login form (currently not submitting)
    $('#login_form').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        live: 'enabled',
        submitButtons: 'button[name="submit"]',
        trigger: null,
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }	// end username validator
            }, //	end username
            password: {
                message: 'The password is not valid',
                validators: {
                    notEmpty: {
                        message: 'You must choose a password'
                    },
                    stringLength: {
                        min: 4,
                        max: 30,
                        message: 'The password must be at least 4 and less than 30 characters long'
                    }
                }	// End pword validator     
			}	// Password
		}	// End of fields
    }); //	End of bootstrap validator	
*/
	
//	Validates User Forms
    $('.user_form').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }	// end username validator
            }, //	end username
            password: {
                message: 'The password is not valid',
                validators: {
                    notEmpty: {
                        message: 'You must choose a password'
                    },
                    stringLength: {
                        min: 8,
                        max: 30,
                        message: 'The password must be at least 8 and less than 30 characters long'
                    }
                }	// End password validator     
			},	// Password
            fname: {
                message: 'You must supply a first name.',
                validators: {
                    notEmpty: {
                        message: 'You must supply a first name.'
                    },
                    stringLength: {
                        min: 1,
                        max: 45,
                        message: 'Supply at least an intial.'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'Your name can only consist of alphabetical, number and underscore'
                    }                    
                }  // End validators  
			}, // End fname
            lname: {
                message: 'You must supply a last name.',
                validators: {
                    notEmpty: {
                        message: 'You must supply a last name.'
                    },
                    stringLength: {
                        min: 1,
                        max: 45,
                        message: 'Supply at least an intial.'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'Your name can only consist of alphabetical, number and underscore'
                    }                                        
                }   // End validators 
			}, // End lname
            visibility: {
                message: 'Tell us what you want.',
                validators: {
                    notEmpty: {
                        message: 'Tell us what you want.'
                    }
                }    // End validators
			}, // End visibility
            profile: {
                message: 'Tell us something.',
                validators: {
                    notEmpty: {
                        message: 'Tell us something.'
                    }
                }    
			}, // End profile
            captcha: {
                message: 'Prove to us you are human.',
                validators: {
                    notEmpty: {
                        message: 'You must pass this test.'
                    }
                }	// End validators    
			} // End profile			
		}	// End of fields
    }); //	End of create_user validator


	/* 	Validates Entry Forms
    $('#create_entry').bootstrapValidator({
    message: 'You must fill this out.',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
            days: {
                validators: {
                    notEmpty: {
                    },                
                        integer: {
                        message: 'The value must be a number.'
                    }
				}        	
			},
            distance: {
                validators: {
                        integer: {
                        message: 'The value must be a number.'
                    }
				}        	
			},
            description: {
                validators: {
                    notEmpty: {
                    }                
				}        	
			}	
		} // End Fields
}); //	End of create_entry bootstrap validator
	*/
	//	Validates Activity Forms
    $('.activity_form').bootstrapValidator({
    message: 'You must fill this out.',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
            name: {
                validators: {
                    notEmpty: {
                    },                
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'The activity name must be more than 3 and less than 30 characters long'
                    }
                                                            
             	}	// End Validators       
			},	// End name
				description: {
	                validators: {
	                    notEmpty: {
	                    },                
	                    stringLength: {
	                        min: 6,
	                        max: 1000,
	                        message: 'The activity description must be more than 6 and less than 1000 characters long'
	                    }
					}	// End validators
				}	// End description
		} // End Fields
}); //	End of add_activity bootstrap validator
	
});

