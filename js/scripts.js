/*
 * Moodle Plugin
 *
 * scripts.js
 *
 * @package    local
 * @subpackage sidebar_contact
 * @copyright  2014 Thomas Threadgold, LearningWorks Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


/*
*	Initialise on load
*/
jQuery(document).ready(function($) {

	function loadForm() {
		var ajaxURL = window.location.origin + '/local/sidebar_contact/index.php';

		jQuery.ajax({
			'url': ajaxURL,
			'dataType' : 'html'
		}).done(function(res){
			// ADD THE FORM TO THE HTML
			$('body').append(res);

			// ATTACH EVENT HANDLERS TO FORM
			$('.local__sidebar-contact--toggle').on('click', function(event) {
				event.preventDefault();
				$('.local__sidebar-contact').toggleClass('active');
			});

			$('.local__sidebar-contact .toggle').on('click', function(event) {
				event.preventDefault();
				$('.local__sidebar-contact').toggleClass('active');
			});

			$('.local__sidebar-contact .form__submit').on('click', function(event) {
				event.preventDefault();

				var valid = true;

				// RESET ERROR STATUS OF FORM INPUTS
				$('.local__sidebar-contact .form__input').removeClass('error');

				// GET THE DATA
				var ajaxURL = $('.local__sidebar-contact .form__url').val();
				var name = $('.local__sidebar-contact .form__name').val();
				var email = $('.local__sidebar-contact .form__email').val();
				var message = $('.local__sidebar-contact .form__message').val();

				// VALIDATE THE DATA
				if( 0 === name.length ) {
					valid = false;
					$('.local__sidebar-contact .form__name').addClass('error');
				}

				if(!isEmail(email)) {
					valid = false;
					$('.local__sidebar-contact .form__email').addClass('error');
				}

				if( 0 === message.length ) {
					valid = false;
					$('.local__sidebar-contact .form__message').addClass('error');
				}

				if(valid) {

					var ajaxdata = {
					 	'action': 'sendmail',
					 	'name': name,
					 	'email': email,
					 	'message': message
					};

					jQuery.post( ajaxURL, ajaxdata, function(res){

						if( res == 'true') {
							$('.local__sidebar-contact .form__feedback--success').fadeIn('slow').delay(3000).fadeOut('slow');
						} else {
							$('.local__sidebar-contact .form__feedback--error').fadeIn('slow').delay(3000).fadeOut('slow');;
						}
					});
				}

				// PREVENT DEFAULT FORM ACTION
				return false;
			});
		});
	}

	loadForm();
});

//VALIDATES INPUT IS FORMATTED AS EMAIL
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}