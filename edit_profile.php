<?php
require_once("include/config.php");
require_once("include/functions.php");

$users = new User();
// $where="cell_parent =0";
// $cells=$user->select_records('tbl_cell','*',$where); 
$cells = $user->select_each_record('tbl_cell','*','cell_parent=0');

//$cells = $users->select_allrecords('tbl_cell','*');

?>
<style type="text/css">
	.box-weight [class*="col-xs-"]:not(.col-xs-12){
      padding: 0px;
	}
</style>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
<script src="https://cdn.jsdelivr.net/npm/moment@2.20.1/moment.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>


<form class="profile edit_profile" action="signup-action.php" method="post" id='signupform'enctype="multipart/form-data" <?php if($_SESSION['sblock']==1){?> style="display:block" <?php }?>>
	
			<div class='title'>USER PROFILE REGISTRATION</div>
			<?php 
		    	
		    if(isset($_SESSION['error_msg'])){
					if($_SESSION['error_msg']!="")
					{
						echo "<div class='error_msg'>";
						echo $_SESSION['error_msg'];	
						echo "</div>";						
					}
				}
				
				?>

				<?php if(isset($_SESSION['success_msg'])){
					if($_SESSION['success_msg']!="")
					{
						echo "<div class='success text-center'>";
						echo $_SESSION['success_msg'];
						echo "</div>";						
					}
				}?>
		

		
	<div class="upper">
	<div class="photo profile_pic" style="background-image: url('img/user.png');">
	<div class="button_container">
	<input type="hidden" name="profile_pic_saved" value="">
	<div class="edit profile_pic">
	Upload <input type="file" name="profile_pic" accept="image/*">
	</div>
	</div>
	</div>
	<div class="basic_info">
	<div class="sect_title">
	Please Fill In All Blanks
	<div class="small">for Minimal Registration</div>
	</div>


    <div class="box-weight">
	<div class="row"> 
	<div class="col-xs-12">

    <div class="col-xs-5">
	  <div class="input-group">
	    <span class="input-group-addon">Surname/Family Name</span>
	    <input type="text" value="" name="last_name" id="last_name" class="form-control">
	  </div>
	</div> 
	<div class="col-xs-7">
	<div class="col-xs-6">
	  <div class="input-group">    
		<span class="input-group-addon">Given Name</span>
		<input type="text" value="" name="first_name" id="first_name" class="form-control">
 	  </div>
	</div> 
	<div class="col-xs-6">
	  <div class="input-group"> 
		<span class="input-group-addon">User Name</span>
		<input type="text" value="" name="username" id="username" class="form-control">
	  </div>
	</div>
	</div>
	</div>
	</div>


	<div class="row"> 
	<div class="col-xs-12">  
	<div class="col-xs-3">
	  <div class="input-group">  
	    <span class="input-group-addon">Date Of Brith</span>
	    <input type="text" value="" name="dob" id="datetime" class="form-control">
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group"> 	   
		<span class="input-group-addon">Gender</span>
		<select name="gender" class="form-control">
		<option value=""> </option>
		<option  value="Male">Male</option>
		<option  value="Female">Female</option>
		</select>
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group"> 
		<span class="input-group-addon">Height</span>
		<select name="height" class="form-control">
		<option value=""> </option>  >
		<option value="95">7' 11"</option>
		<option value="94">7' 10"(239cm)</option>
		<option value="93">7' 9"</option>
		<option value="92">7' 8"(234cm)</option>
		<option value="91">7' 7"</option>
		<option value="90">7' 6"(229cm)</option>
		<option value="89">7' 5"</option>
		<option value="88">7' 4"(224cm)</option>
		<option value="87">7' 3"</option>
		<option value="86">7' 2"(218cm)</option>
		<option value="85">7' 1"</option>
		<option value="84">7'(213cm)</option>
		<option value="83">6' 11"</option>
		<option value="82">6' 10"(208cm)</option>
		<option value="81">6' 9"</option>
		<option value="80">6' 8"(203cm)</option>
		<option value="79">6' 7"</option>
		<option value="78">6' 6"(198cm)</option>
		<option value="77">6' 5"</option>
		<option value="76">6' 4"(193cm)</option>
		<option value="75">6' 3"</option>
		<option value="74">6' 2"(188cm)</option>
		<option value="73">6' 1"</option>
		<option value="72">6'(183cm)</option>
		<option value="71">5' 11"</option>
		<option value="70">5' 10"(178cm)</option>
		<option value="69">5' 9"</option>
		<option value="68">5' 8"(173cm)</option>
		<option value="67">5' 7"</option>
		<option value="66">5' 6"(168cm)</option>
		<option value="65">5' 5"</option>
		<option value="64">5' 4"(163cm)</option>
		<option value="63">5' 3"</option>
		<option value="62">5' 2"(157cm)</option>
		<option value="61">5' 1"</option>
		<option value="60">5'(152cm)</option>
		<option value="59">4' 11"</option>
		<option value="58">4' 10"(147cm)</option>
		<option value="57">4' 9"</option>
		<option value="56">4' 8"(142cm)</option>
		<option value="55">4' 7"</option>
		<option value="54">4' 6"(137cm)</option>
		<option value="53">4' 5"</option>
		<option value="52">4' 4"(132cm)</option>
		<option value="51">4' 3"</option>
		<option value="50">4' 2"(127cm)</option>
		<option value="49">4' 1"</option>
		<option value="48">4'(122cm)</option>
		</select>
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
		<span class="input-group-addon">Weight</span>
		<select name="weight" class="form-control">
		<option value=""> </option>
		 <?php for($i=300; $i>=40; $i-- ){?>
		    <option value="<?php echo $i; ?>">
		    <?php echo $i; ?>lb (<?php echo $i/2; ?>kilo)</option>
		 <?php } ?>
			 
		</select>
	  </div>
	</div>
	</div>
	</div>

	<div class="row"> 
	<div class="col-xs-12"> 
	<div class="col-xs-3">
	  <div class="input-group">
	    <span class="input-group-addon">Profession</span>
	    <input type="text" value="" name="profession" class="form-control">
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
	    <span class="input-group-addon">City</span>
	    <input type="text" value="" name="city" class="form-control">
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
	    <span class="input-group-addon">Country</span>
	    <input type="text" value="" name="country" class="form-control">
	   
		<!-- <span class="input-group-addon">City</span> -->
		<!-- <select name="state" class="form-control">
		<option value=""> </option>
		<option  value="AL">AL</option>
		<option  value="AK">AK</option>
		<option  value="AZ">AZ</option>
		<option  value="AR">AR</option>
		<option  value="CA">CA</option>
		<option  value="CO">CO</option>
		<option  value="CT">CT</option>
		<option  value="DE">DE</option>
		<option  value="FL">FL</option>
		<option  value="GA">GA</option>
		<option  value="HI">HI</option>
		<option  value="ID">ID</option>
		<option  value="IL">IL</option>
		<option  value="IN">IN</option>
		<option  value="IA">IA</option>
		<option  value="KS">KS</option>
		<option  value="KY">KY</option>
		<option  value="LA">LA</option>
		<option  value="ME">ME</option>
		<option  value="MD">MD</option>
		<option  value="MA">MA</option>
		<option  value="MI">MI</option>
		<option  value="MN">MN</option>
		<option  value="MS">MS</option>
		<option  value="MO">MO</option>
		<option  value="MT">MT</option>
		<option  value="NE">NE</option>
		<option  value="NV">NV</option>
		<option  value="NH">NH</option>
		<option  value="NJ">NJ</option>
		<option  value="NM">NM</option>
		<option  value="NY">NY</option>
		<option  value="NC">NC</option>
		<option  value="ND">ND</option>
		<option  value="OH">OH</option>
		<option  value="OK">OK</option>
		<option  value="OR">OR</option>
		<option  value="PA">PA</option>
		<option  value="RI">RI</option>
		<option  value="SC">SC</option>
		<option  value="SD">SD</option>
		<option  value="TN">TN</option>
		<option  value="TX">TX</option>
		<option  value="UT">UT</option>
		<option  value="VT">VT</option>
		<option  value="VA">VA</option>
		<option  value="WA">WA</option>
		<option  value="WV">WV</option>
		<option  value="WI">WI</option>
		<option  value="WY">WY</option>
		</select> -->
 
		<!-- <span class="input-group-addon">Country</span> -->
		<!-- <select name="country" class="form-control">
		<option value=""> </option>
		<option  value="AF">Afghanistan</option>
		<option  value="(AL">Alb)ania</option>
		<option  value="DZ">Algeria</option>
		<option  value="AS">American Samoa</option>
		<option  value="AD">AndorrA</option>
		<option  value="AO">Angola</option>
		<option  value="AI">Anguilla</option>
		<option  value="AQ">Antarctica</option>
		<option  value="AG">Antigua and Barbuda</option>
		<option  value="AR">Argentina</option>
		<option  value="AM">Armenia</option>
		<option  value="AW">Aruba</option>
		<option  value="AU">Australia</option>
		<option  value="AT">Austria</option>
		<option  value="AZ">Azerbaijan</option>
		<option  value="AX">Åland Islands</option>
		<option  value="BS">Bahamas</option>
		<option  value="BH">Bahrain</option>
		<option  value="BD">Bangladesh</option>
		<option  value="BB">Barbados</option>
		<option  value="BY">Belarus</option>
		<option  value="BE">Belgium</option>
		<option  value="BZ">Belize</option>
		<option  value="BJ">Benin</option>
		<option  value="BM">Bermuda</option>
		<option  value="BT">Bhutan</option>
		<option  value="BO">Bolivia</option>
		<option  value="BA">Bosnia and Herzegovina</option>
		<option  value="BW">Botswana</option>
		<option  value="BV">Bouvet Island</option>
		<option  value="BR">Brazil</option>
		<option  value="IO">British Indian Ocean Territory</option>
		<option  value="BN">Brunei Darussalam</option>
		<option  value="BG">Bulgaria</option>
		<option  value="BF">Burkina Faso</option>
		<option  value="BI">Burundi</option>
		<option  value="KH">Cambodia</option>
		<option  value="CM">Cameroon</option>
		<option  value="CA">Canada</option>
		<option  value="CV">Cape Verde</option>
		<option  value="KY">Cayman Islands</option>
		<option  value="CF">Central African Republic</option>
		<option  value="TD">Chad</option>
		<option  value="CL">Chile</option>
		<option  value="CN">China</option>
		<option  value="CX">Christmas Island</option>
		<option  value="CC">Cocos (Keeling) Islands</option>
		<option  value="CO">Colombia</option>
		<option  value="KM">Comoros</option>
		<option  value="CG">Congo</option>
		<option  value="CD">Congo, The Democratic Republic of the</option>
		<option  value="CK">Cook Islands</option>
		<option  value="CR">Costa Rica</option>
		<option  value="CI">Cote D"Ivoire</option>
		<option  value="HR">Croatia</option>
		<option  value="CU">Cuba</option>
		<option  value="CY">Cyprus</option>
		<option  value="CZ">Czech Republic</option>
		<option  value="DK">Denmark</option>
		<option  value="DJ">Djibouti</option>
		<option  value="DM">Dominica</option>
		<option  value="DO">Dominican Republic</option>
		<option  value="EC">Ecuador</option>
		<option  value="EG">Egypt</option>
		<option  value="SV">El Salvador</option>
		<option  value="GQ">Equatorial Guinea</option>
		<option  value="ER">Eritrea</option>
		<option  value="EE">Estonia</option>
		<option  value="ET">Ethiopia</option>
		<option  value="FK">Falkland Islands (Malvinas)</option>
		<option  value="FO">Faroe Islands</option>
		<option  value="FJ">Fiji</option>
		<option  value="FI">Finland</option>
		<option  value="FR">France</option>
		<option  value="GF">French Guiana</option>
		<option  value="PF">French Polynesia</option>
		<option  value="TF">French Southern Territories</option>
		<option  value="GA">Gabon</option>
		<option  value="GM">Gambia</option>
		<option  value="GE">Georgia</option>
		<option  value="DE">Germany</option>
		<option  value="GH">Ghana</option>
		<option  value="GI">Gibraltar</option>
		<option  value="GR">Greece</option>
		<option  value="GL">Greenland</option>
		<option  value="GD">Grenada</option>
		<option  value="GP">Guadeloupe</option>
		<option  value="GU">Guam</option>
		<option  value="GT">Guatemala</option>
		<option  value="GG">Guernsey</option>
		<option  value="GN">Guinea</option>
		<option  value="GW">Guinea-Bissau</option>
		<option  value="GY">Guyana</option>
		<option  value="HT">Haiti</option>
		<option  value="HM">Heard Island and Mcdonald Islands</option>
		<option  value="VA">Holy See (Vatican City State)</option>
		<option  value="HN">Honduras</option>
		<option  value="HK">Hong Kong</option>
		<option  value="HU">Hungary</option>
		<option  value="IS">Iceland</option>
		<option  value="IN">India</option>
		<option  value="ID">Indonesia</option>
		<option  value="IR">Iran, Islamic Republic Of</option>
		<option  value="IQ">Iraq</option>
		<option  value="IE">Ireland</option>
		<option  value="IM">Isle of Man</option>
		<option  value="IL">Israel</option>
		<option  value="IT">Italy</option>
		<option  value="JM">Jamaica</option>
		<option  value="JP">Japan</option>
		<option  value="JE">Jersey</option>
		<option  value="JO">Jordan</option>
		<option  value="KZ">Kazakhstan</option>
		<option  value="KE">Kenya</option>
		<option  value="KI">Kiribati</option>
		<option  value="KP">Korea, Democratic People"S Republic of</option>
		<option  value="KR">Korea, Republic of</option>
		<option  value="KW">Kuwait</option>
		<option  value="KG">Kyrgyzstan</option>
		<option  value="LA">Lao People"S Democratic Republic</option>
		<option  value="LV">Latvia</option>
		<option  va(lue="LB)">Lebanon</option>
		<option  value="LS">Lesotho</option>
		<option  value="LR">Liberia</option>
		<option  value="LY">Libyan Arab Jamahiriya</option>
		<option  value="LI">Liechtenstein</option>
		<option  value="LT">Lithuania</option>
		<option  value="LU">Luxembourg</option>
		<option  value="MO">Macao</option>
		<option  value="MK">Macedonia, The Former Yugoslav Republic of</option>
		<option  value="MG">Madagascar</option>
		<option  value="MW">Malawi</option>
		<option  value="MY">Malaysia</option>
		<option  value="MV">Maldives</option>
		<option  value="ML">Mali</option>
		<option  value="MT">Malta</option>
		<option  value="MH">Marshall Islands</option>
		<option  value="MQ">Martinique</option>
		<option  value="MR">Mauritania</option>
		<option  value="MU">Mauritius</option>
		<option  value="YT">Mayotte</option>
		<option  value="MX">Mexico</option>
		<option  value="FM">Micronesia, Federated States of</option>
		<option  value="MD">Moldova, Republic of</option>
		<option  value="MC">Monaco</option>
		<option  value="MN">Mongolia</option>
		<option  value="MS">Montserrat</option>
		<option  value="MA">Morocco</option>
		<option  value="MZ">Mozambique</option>
		<option  value="MM">Myanmar</option>
		<option  value="NA">Namibia</option>
		<option  value="NR">Nauru</option>
		<option  value="NP">Nepal</option>
		<option  value="NL">Netherlands</option>
		<option  value="AN">Netherlands Antilles</option>
		<option  value="NC">New Caledonia</option>
		<option  value="NZ">New Zealand</option>
		<option  value="NI">Nicaragua</option>
		<option  value="NE">Niger</option>
		<option  value="NG">Nigeria</option>
		<option  value="NU">Niue</option>
		<option  value="NF">Norfolk Island</option>
		<option  value="MP">Northern Mariana Islands</option>
		<option  value="NO">Norway</option>
		<option  value="OM">Oman</option>
		<option  value="PK">Pakistan</option>
		<option  value="PW">Palau</option>
		<option  value="PS">Palestinian Territory, Occupied</option>
		<option  value="PA">Panama</option>
		<option  value="PG">Papua New Guinea</option>
		<option  value="PY">Paraguay</option>
		<option  value="PE">Peru</option>
		<option  value="PH">Philippines</option>
		<option  value="PN">Pitcairn</option>
		<option  value="PL">Poland</option>
		<option  value="PT">Portugal</option>
		<option  value="PR">Puerto Rico</option>
		<option  value="QA">Qatar</option>
		<option  value="RE">Reunion</option>
		<option  value="RO">Romania</option>
		<option  value="RU">Russian Federation</option>
		<option  value="RW">RWANDA</option>
		<option  value="SH">Saint Helena</option>
		<option  value="KN">Saint Kitts and Nevis</option>
		<option  value="LC">Saint Lucia</option>
		<option  value="PM">Saint Pierre and Miquelon</option>
		<option  value="VC">Saint Vincent and the Grenadines</option>
		<option  value="WS">Samoa</option>
		<option  value="SM">San Marino</option>
		<option  value="ST">Sao Tome and Principe</option>
		<option  value="SA">Saudi Arabia</option>
		<option  value="SN">Senegal</option>
		<option  value="CS">Serbia and Montenegro</option>
		<option  value="SC">Seychelles</option>
		<option  value="SL">Sierra Leone</option>
		<option  value="SG">Singapore</option>
		<option  value="SK">Slovakia</option>
		<option  value="SI">Slovenia</option>
		<option  value="SB">Solomon Islands</option>
		<option  value="SO">Somalia</option>
		<option  value="ZA">South Africa</option>
		<option  value="GS">South Georgia and the South Sandwich Islands</option>
		<option  value="ES">Spain</option>
		<option  value="LK">Sri Lanka</option>
		<option  value="SD">Sudan</option>
		<option  value="SR">Suriname</option>
		<option  value="SJ(">Svalb)ard and Jan Mayen</option>
		<option  value="SZ">Swaziland</option>
		<option  value="SE">Sweden</option>
		<option  value="CH">Switzerland</option>
		<option  value="SY">Syrian Arab Republic</option>
		<option  value="TW">Taiwan, Province of China</option>
		<option  value="TJ">Tajikistan</option>
		<option  value="TZ">Tanzania, United Republic of</option>
		<option  value="TH">Thailand</option>
		<option  value="TL">Timor-Leste</option>
		<option  value="TG">Togo</option>
		<option  value="TK">Tokelau</option>
		<option  value="TO">Tonga</option>
		<option  value="TT">Trinidad and Tobago</option>
		<option  value="TN">Tunisia</option>
		<option  value="TR">Turkey</option>
		<option  value="TM">Turkmenistan</option>
		<option  value="TC">Turks and Caicos Islands</option>
		<option  value="TV">Tuvalu</option>
		<option  value="UG">Uganda</option>
		<option  value="UA">Ukraine</option>
		<option  value="AE">United Arab Emirates</option>
		<option  value="GB">United Kingdom</option>
		<option  value="US">United States</option>
		<option  value="UM">United States Minor Outlying Islands</option>
		<option  value="UY">Uruguay</option>
		<option  value="UZ">Uzbekistan</option>
		<option  value="VU">Vanuatu</option>
		<option  value="VE">Venezuela</option>
		<option  value="VN">Viet Nam</option>
		<option  value="VG">Virgin Islands, British</option>
		<option  value="VI">Virgin Islands, U.S.</option>
		<option  value="WF">Wallis and Futuna</option>
		<option  value="EH">Western Sahara</option>
		<option  value="YE">Yemen</option>
		<option  value="ZM">Zambia</option>
		<option  value="ZW">Zimbabwe</option>
		</select> -->
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
		<span class="input-group-addon">Phone number</span>
		<input type="text" value="" name="phoneno" class="form-control">
	  </div>
	</div>
	</div>
	</div>

	<div class="row"> 
	<div class="col-xs-12"> 
	<div class="col-xs-3">
	  <div class="input-group"> 
	    <span class="input-group-addon">Password</span>
	    <input type="password" value="" name="password" class="form-control">
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
		<span class="input-group-addon">Confirm</span>
		<input type="password" value="" name="pw_confirm" class="form-control">
       </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
		<span class="input-group-addon">Email</span>
		<input type="email" value="" name="email" class="form-control">
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
		<span class="input-group-addon">Confirm</span>
		<input type="email" value="" name="email_confirm" class="form-control">
	  </div>
	</div>
	</div>
    </div>
    </div>
    <div class="click-box">
      <p>Click on the bottons to add details</p>
      <a href="#" class="btn-box">Education</a>
      <a href="#" class="btn-box">Work history</a>
    </div> 
	</div>
	</div>




	<div class="info">
	<div class="sect soi">
	<div class="sect_title">
	Please check the boxes that you find interesting
	<div class="small">for better Results</div>
	</div> 



	<div class="col">
	<?php 
		$n=count($cells);
		foreach($cells as $rows)
		{
			$id=$rows['id'];
			 for($i=1; $i <= 1; $i++){?>
				<label class="interest" style="display: block;">
				<input type="checkbox" name="cell_name[]" value="<?php echo $rows['cell_id']?>" >
				<?php
					echo $rows['cell_name'];
					echo "</label>";
				?>  
				<?php  if(($n % $i) == 0) {
		   echo "</div>
		   		<div class='col'>";
			} ?>
			 <?php }
		}
	 ?> 
	</div> 



	</div>

	<div class="sect about">
	<div class="sect_title">About</div>
	<textarea class="text" name="bio"></textarea>
	</div>
	<div class="buttons">
	<input type="submit" name="submit" id ='submit' value="Register" class="save">
	</div>
	</div>

	</form>

<?php
	unset($_SESSION['sblock']);
	unset($_SESSION['error_msg']);
	unset($_SESSION['success_msg']);

?>


<script type="text/javascript">
    $("#datetime").datetimepicker({format: 'Y/MM/DD'});
</script>


	<script src="admin/bower_components/jquery-validation/jquery.validate.js"></script>
	<script src="js/add-singup.js"></script> 

	<script>
		$(document).ready(function () {
			$("#submit").click(function(){
			    if($('#signupform').find('input[type=checkbox]:checked').length == 0)
			    {
			        alert('Please select atleast one checkbox');
			    }
			});
		});
	</script>