<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
   <a href="<?= base_url(); ?>/index">Home</a> &gt;
   <a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
   <a href="<?= base_url(); ?>/author" class="hierarchyLink">Author</a> &gt;
   <a href="<?= base_url(); ?>/author" class="hierarchyLink">Submissions</a> &gt;
   <a href="<?= base_url(); ?>/author/submit/3/<?= $article['article_id']; ?>" class="current">New Submission</a>
</div>
<h2>Step 3. Entering the Submission's Metadata</h2>
<div id="content">
   <ul class="steplist">
      <li id="step1"><a href="<?= base_url(); ?>/author/submit/1/<?= $article['article_id']; ?>">1. Start</a></li>
      <li id="step2"><a href="<?= base_url(); ?>/author/submit/2/<?= $article['article_id']; ?>">2. Upload Submission</a></li>
      <li id="step3" class="current">3. Enter Metadata</li>
      <li id="step4">4. Upload Supplementary Files</li>
      <li id="step5">5. Confirmation</li>
   </ul>
   <div class="separator"></div>
   <form name="addArticle" method="post" action="<?= base_url(); ?>/author/saveSubmit/3/<?= $article['article_id']; ?>">
      <input type="hidden" name="article[articleId]" value="<?php if (isset($article['article_id'])) echo $article['article_id']; ?>" />
      <div id="authors">
         <h3>Authors</h3>
         <?php if (isset($authors)) : ?>
            <?php $index = 0; ?>
            <?php foreach ($authors as $author) : ?>
               <input type="hidden" name="authors[<?= $index; ?>][authorId]" value="<?php if (isset($author['author_id'])) echo $author['author_id']; ?>" />
               <table width="100%" class="data">
                  <tr valign="top">
                     <td width="20%" class="label">
                        <label for="authors-0-firstName">
                           First Name *</label>
                     </td>
                     <td width="80%" class="value"><input type="text" class="textField" name="authors[<?= $index; ?>][firstName]" id="authors-0-firstName" value="<?php if (isset($author['first_name'])) echo $author['first_name'];
                                                                                                                                                                  else echo 'First Name'; ?>" size="20" maxlength="40" /></td>
                  </tr>
                  <tr valign="top">
                     <td width="20%" class="label">
                        <label for="authors-0-middleName">
                           Middle Name </label>
                     </td>
                     <td width="80%" class="value"><input type="text" class="textField" name="authors[<?= $index; ?>][middleName]" id="authors-0-middleName" value="<?php if (isset($author['author_id'])) echo $author['middle_name'] ?>" size="20" maxlength="40" /></td>
                  </tr>
                  <tr valign="top">
                     <td width="20%" class="label">
                        <label for="authors-0-lastName">
                           Last Name *</label>
                     </td>
                     <td width="80%" class="value"><input type="text" class="textField" name="authors[<?= $index; ?>][lastName]" id="authors-0-lastName" value="<?php if (isset($author['author_id'])) echo $author['last_name'];
                                                                                                                                                                  else echo 'Last Name'; ?>" size="20" maxlength="90" /></td>
                  </tr>
                  <tr valign="top">
                     <td width="20%" class="label">
                        <label for="authors-0-email">
                           Email *</label>
                     </td>
                     <td width="80%" class="value"><input type="text" class="textField" name="authors[<?= $index; ?>][email]" id="authors-0-email" value="<?php if (isset($author['author_id'])) echo $author['email']; ?>" size="30" maxlength="90" /></td>
                  </tr>
                  <tr valign="top">
                     <td class="label">
                        <label for="authors-0-url">
                           URL </label>
                     </td>
                     <td class="value"><input type="text" name="authors[<?= $index; ?>][url]" id="authors-0-url" value="<?php if (isset($author['author_id'])) echo $author['url']; ?>" size="30" maxlength="255" class="textField" /></td>
                  </tr>
                  <tr valign="top">
                     <td width="20%" class="label">
                        <label for="authors-0-affiliation">
                           Affiliation </label>
                     </td>
                     <td width="80%" class="value">
                        <textarea name="authors[<?= $index; ?>][affiliation]" class="textArea" id="authors-0-affiliation" rows="5" cols="40"><?php if (isset($author['author_id'])) echo $author['affiliation']; ?></textarea><br />
                        <span class="instruct">(Your institution, e.g. "Simon Fraser University")</span>
                     </td>
                  </tr>
                  <tr valign="top">
                     <td width="20%" class="label">
                        <label for="authors-0-country">
                           Country </label>
                     </td>
                     <td width="80%" class="value">
                        <select name="authors[<?= $index; ?>][country]" id="authors-0-country" class="selectMenu">
                           <option value=""></option>
                           <option label="Afghanistan" value="AF" <?= ($author['country'] == 'AF') ? "selected" : ""; ?>>Afghanistan</option>
                           <option label="Albania" value="AL" <?= ($author['country'] == 'AL') ? "selected" : ""; ?>>Albania</option>
                           <option label="Algeria" value="DZ" <?= ($author['country'] == 'DZ') ? "selected" : ""; ?>>Algeria</option>
                           <option label="American Samoa" value="AS" <?= ($author['country'] == 'AS') ? "selected" : ""; ?>>American Samoa</option>
                           <option label="Andorra" value="AD" <?= ($author['country'] == 'AD') ? "selected" : ""; ?>>Andorra</option>
                           <option label="Angola" value="AO" <?= ($author['country'] == 'AO') ? "selected" : ""; ?>>Angola</option>
                           <option label="Anguilla" value="AI" <?= ($author['country'] == 'AI') ? "selected" : ""; ?>>Anguilla</option>
                           <option label="Antarctica" value="AQ" <?= ($author['country'] == 'AQ') ? "selected" : ""; ?>>Antarctica</option>
                           <option label="Antigua and Barbuda" value="AG" <?= ($author['country'] == 'AG') ? "selected" : ""; ?>>Antigua and Barbuda</option>
                           <option label="Argentina" value="AR" <?= ($author['country'] == 'AR') ? "selected" : ""; ?>>Argentina</option>
                           <option label="Armenia" value="AM" <?= ($author['country'] == 'AM') ? "selected" : ""; ?>>Armenia</option>
                           <option label="Aruba" value="AW" <?= ($author['country'] == 'AW') ? "selected" : ""; ?>>Aruba</option>
                           <option label="Australia" value="AU" <?= ($author['country'] == 'AU') ? "selected" : ""; ?>>Australia</option>
                           <option label="Austria" value="AT" <?= ($author['country'] == 'AT') ? "selected" : ""; ?>>Austria</option>
                           <option label="Azerbaijan" value="AZ" <?= ($author['country'] == 'AZ') ? "selected" : ""; ?>>Azerbaijan</option>
                           <option label="Bahamas" value="BS" <?= ($author['country'] == 'BS') ? "selected" : ""; ?>>Bahamas</option>
                           <option label="Bahrain" value="BH" <?= ($author['country'] == 'BH') ? "selected" : ""; ?>>Bahrain</option>
                           <option label="Bangladesh" value="BD" <?= ($author['country'] == 'BD') ? "selected" : ""; ?>>Bangladesh</option>
                           <option label="Barbados" value="BB" <?= ($author['country'] == 'BB') ? "selected" : ""; ?>>Barbados</option>
                           <option label="Belarus" value="BY" <?= ($author['country'] == 'BY') ? "selected" : ""; ?>>Belarus</option>
                           <option label="Belgium" value="BE" <?= ($author['country'] == 'BE') ? "selected" : ""; ?>>Belgium</option>
                           <option label="Belize" value="BZ" <?= ($author['country'] == 'BZ') ? "selected" : ""; ?>>Belize</option>
                           <option label="Benin" value="BJ" <?= ($author['country'] == 'BJ') ? "selected" : ""; ?>>Benin</option>
                           <option label="Bermuda" value="BM" <?= ($author['country'] == 'BM') ? "selected" : ""; ?>>Bermuda</option>
                           <option label="Bhutan" value="BT" <?= ($author['country'] == 'BT') ? "selected" : ""; ?>>Bhutan</option>
                           <option label="Bolivia, Plurinational State of" value="BO" <?= ($author['country'] == 'BO') ? "selected" : ""; ?>>Bolivia, Plurinational State of</option>
                           <option label="Bosnia and Herzegovina" value="BA" <?= ($author['country'] == 'BA') ? "selected" : ""; ?>>Bosnia and Herzegovina</option>
                           <option label="Botswana" value="BW" <?= ($author['country'] == 'BW') ? "selected" : ""; ?>>Botswana</option>
                           <option label="Bouvet Island" value="BV" <?= ($author['country'] == 'BV') ? "selected" : ""; ?>>Bouvet Island</option>
                           <option label="Brazil" value="BR" <?= ($author['country'] == 'BR') ? "selected" : ""; ?>>Brazil</option>
                           <option label="British Indian Ocean Territory" value="IO" <?= ($author['country'] == 'IO') ? "selected" : ""; ?>>British Indian Ocean Territory</option>
                           <option label="Brunei Darussalam" value="BN" <?= ($author['country'] == 'BN') ? "selected" : ""; ?>>Brunei Darussalam</option>
                           <option label="Bulgaria" value="BG" <?= ($author['country'] == 'BG') ? "selected" : ""; ?>>Bulgaria</option>
                           <option label="Burkina Faso" value="BF" <?= ($author['country'] == 'BF') ? "selected" : ""; ?>>Burkina Faso</option>
                           <option label="Burundi" value="BI" <?= ($author['country'] == 'BI') ? "selected" : ""; ?>>Burundi</option>
                           <option label="Cambodia" value="KH" <?= ($author['country'] == 'KH') ? "selected" : ""; ?>>Cambodia</option>
                           <option label="Cameroon" value="CM" <?= ($author['country'] == 'CM') ? "selected" : ""; ?>>Cameroon</option>
                           <option label="Canada" value="CA" <?= ($author['country'] == 'CA') ? "selected" : ""; ?>>Canada</option>
                           <option label="Cape Verde" value="CV" <?= ($author['country'] == 'CV') ? "selected" : ""; ?>>Cape Verde</option>
                           <option label="Cayman Islands" value="KY" <?= ($author['country'] == 'KY') ? "selected" : ""; ?>>Cayman Islands</option>
                           <option label="Central African Republic" value="CF" <?= ($author['country'] == 'CF') ? "selected" : ""; ?>>Central African Republic</option>
                           <option label="Chad" value="TD" <?= ($author['country'] == 'TD') ? "selected" : ""; ?>>Chad</option>
                           <option label="Chile" value="CL" <?= ($author['country'] == 'CL') ? "selected" : ""; ?>>Chile</option>
                           <option label="China" value="CN" <?= ($author['country'] == 'CN') ? "selected" : ""; ?>>China</option>
                           <option label="Christmas Island" value="CX" <?= ($author['country'] == 'CX') ? "selected" : ""; ?>>Christmas Island</option>
                           <option label="Cocos (Keeling) Islands" value="CC" <?= ($author['country'] == 'CC') ? "selected" : ""; ?>>Cocos (Keeling) Islands</option>
                           <option label="Colombia" value="CO" <?= ($author['country'] == 'CO') ? "selected" : ""; ?>>Colombia</option>
                           <option label="Comoros" value="KM" <?= ($author['country'] == 'KM') ? "selected" : ""; ?>>Comoros</option>
                           <option label="Congo" value="CG" <?= ($author['country'] == 'CG') ? "selected" : ""; ?>>Congo</option>
                           <option label="Congo, the Democratic Republic of the" value="CD" <?= ($author['country'] == 'CD') ? "selected" : ""; ?>>Congo, the Democratic Republic of the</option>
                           <option label="Cook Islands" value="CK" <?= ($author['country'] == 'CK') ? "selected" : ""; ?>>Cook Islands</option>
                           <option label="Costa Rica" value="CR" <?= ($author['country'] == 'CR') ? "selected" : ""; ?>>Costa Rica</option>
                           <option label="Croatia" value="HR" <?= ($author['country'] == 'HR') ? "selected" : ""; ?>>Croatia</option>
                           <option label="Cuba" value="CU" <?= ($author['country'] == 'CU') ? "selected" : ""; ?>>Cuba</option>
                           <option label="Cyprus" value="CY" <?= ($author['country'] == 'CY') ? "selected" : ""; ?>>Cyprus</option>
                           <option label="Czech Republic" value="CZ" <?= ($author['country'] == 'CZ') ? "selected" : ""; ?>>Czech Republic</option>
                           <option label="Côte d'Ivoire" value="CI" <?= ($author['country'] == 'CI') ? "selected" : ""; ?>>Côte d'Ivoire</option>
                           <option label="Denmark" value="DK" <?= ($author['country'] == 'DK') ? "selected" : ""; ?>>Denmark</option>
                           <option label="Djibouti" value="DJ" <?= ($author['country'] == 'DJ') ? "selected" : ""; ?>>Djibouti</option>
                           <option label="Dominica" value="DM" <?= ($author['country'] == 'DM') ? "selected" : ""; ?>>Dominica</option>
                           <option label="Dominican Republic" value="DO" <?= ($author['country'] == 'DO') ? "selected" : ""; ?>>Dominican Republic</option>
                           <option label="Ecuador" value="EC" <?= ($author['country'] == 'EC') ? "selected" : ""; ?>>Ecuador</option>
                           <option label="Egypt" value="EG" <?= ($author['country'] == 'EG') ? "selected" : ""; ?>>Egypt</option>
                           <option label="El Salvador" value="SV" <?= ($author['country'] == 'SV') ? "selected" : ""; ?>>El Salvador</option>
                           <option label="Equatorial Guinea" value="GQ" <?= ($author['country'] == 'GQ') ? "selected" : ""; ?>>Equatorial Guinea</option>
                           <option label="Eritrea" value="ER" <?= ($author['country'] == 'ER') ? "selected" : ""; ?>>Eritrea</option>
                           <option label="Estonia" value="EE" <?= ($author['country'] == 'EE') ? "selected" : ""; ?>>Estonia</option>
                           <option label="Ethiopia" value="ET" <?= ($author['country'] == 'ET') ? "selected" : ""; ?>>Ethiopia</option>
                           <option label="Falkland Islands (Malvinas)" value="FK" <?= ($author['country'] == 'FK') ? "selected" : ""; ?>>Falkland Islands (Malvinas)</option>
                           <option label="Faroe Islands" value="FO" <?= ($author['country'] == 'FO') ? "selected" : ""; ?>>Faroe Islands</option>
                           <option label="Fiji" value="FJ" <?= ($author['country'] == 'FJ') ? "selected" : ""; ?>>Fiji</option>
                           <option label="Finland" value="FI" <?= ($author['country'] == 'FI') ? "selected" : ""; ?>>Finland</option>
                           <option label="France" value="FR" <?= ($author['country'] == 'FR') ? "selected" : ""; ?>>France</option>
                           <option label="French Guiana" value="GF" <?= ($author['country'] == 'GF') ? "selected" : ""; ?>>French Guiana</option>
                           <option label="French Polynesia" value="PF" <?= ($author['country'] == 'PF') ? "selected" : ""; ?>>French Polynesia</option>
                           <option label="French Southern Territories" value="TF" <?= ($author['country'] == 'TF') ? "selected" : ""; ?>>French Southern Territories</option>
                           <option label="Gabon" value="GA" <?= ($author['country'] == 'GA') ? "selected" : ""; ?>>Gabon</option>
                           <option label="Gambia" value="GM" <?= ($author['country'] == 'GM') ? "selected" : ""; ?>>Gambia</option>
                           <option label="Georgia" value="GE" <?= ($author['country'] == 'GE') ? "selected" : ""; ?>>Georgia</option>
                           <option label="Germany" value="DE" <?= ($author['country'] == 'DE') ? "selected" : ""; ?>>Germany</option>
                           <option label="Ghana" value="GH" <?= ($author['country'] == 'GH') ? "selected" : ""; ?>>Ghana</option>
                           <option label="Gibraltar" value="GI" <?= ($author['country'] == 'GI') ? "selected" : ""; ?>>Gibraltar</option>
                           <option label="Greece" value="GR" <?= ($author['country'] == 'GR') ? "selected" : ""; ?>>Greece</option>
                           <option label="Greenland" value="GL" <?= ($author['country'] == 'GL') ? "selected" : ""; ?>>Greenland</option>
                           <option label="Grenada" value="GD" <?= ($author['country'] == 'GD') ? "selected" : ""; ?>>Grenada</option>
                           <option label="Guadeloupe" value="GP" <?= ($author['country'] == 'GP') ? "selected" : ""; ?>>Guadeloupe</option>
                           <option label="Guam" value="GU" <?= ($author['country'] == 'GU') ? "selected" : ""; ?>>Guam</option>
                           <option label="Guatemala" value="GT" <?= ($author['country'] == 'GT') ? "selected" : ""; ?>>Guatemala</option>
                           <option label="Guernsey" value="GG" <?= ($author['country'] == 'GG') ? "selected" : ""; ?>>Guernsey</option>
                           <option label="Guinea" value="GN" <?= ($author['country'] == 'GN') ? "selected" : ""; ?>>Guinea</option>
                           <option label="Guinea-Bissau" value="GW" <?= ($author['country'] == 'GW') ? "selected" : ""; ?>>Guinea-Bissau</option>
                           <option label="Guyana" value="GY" <?= ($author['country'] == 'GY') ? "selected" : ""; ?>>Guyana</option>
                           <option label="Haiti" value="HT" <?= ($author['country'] == 'HT') ? "selected" : ""; ?>>Haiti</option>
                           <option label="Heard Island and McDonald Islands" value="HM" <?= ($author['country'] == 'HM') ? "selected" : ""; ?>>Heard Island and McDonald Islands</option>
                           <option label="Holy See (Vatican City State)" value="VA" <?= ($author['country'] == 'VA') ? "selected" : ""; ?>>Holy See (Vatican City State)</option>
                           <option label="Honduras" value="HN" <?= ($author['country'] == 'HN') ? "selected" : ""; ?>>Honduras</option>
                           <option label="Hong Kong" value="HK" <?= ($author['country'] == 'HK') ? "selected" : ""; ?>>Hong Kong</option>
                           <option label="Hungary" value="HU" <?= ($author['country'] == 'HU') ? "selected" : ""; ?>>Hungary</option>
                           <option label="Iceland" value="IS" <?= ($author['country'] == 'IS') ? "selected" : ""; ?>>Iceland</option>
                           <option label="India" value="IN" <?= ($author['country'] == 'IN') ? "selected" : ""; ?>>India</option>
                           <option label="Indonesia" value="ID" <?= ($author['country'] == 'ID') ? "selected" : ""; ?>>Indonesia</option>
                           <option label="Iran, Islamic Republic of" value="IR" <?= ($author['country'] == 'IR') ? "selected" : ""; ?>>Iran, Islamic Republic of</option>
                           <option label="Iraq" value="IQ" <?= ($author['country'] == 'IQ') ? "selected" : ""; ?>>Iraq</option>
                           <option label="Ireland" value="IE" <?= ($author['country'] == 'IE') ? "selected" : ""; ?>>Ireland</option>
                           <option label="Isle of Man" value="IM" <?= ($author['country'] == 'IM') ? "selected" : ""; ?>>Isle of Man</option>
                           <option label="Israel" value="IL" <?= ($author['country'] == 'IL') ? "selected" : ""; ?>>Israel</option>
                           <option label="Italy" value="IT" <?= ($author['country'] == 'IT') ? "selected" : ""; ?>>Italy</option>
                           <option label="Jamaica" value="JM" <?= ($author['country'] == 'JM') ? "selected" : ""; ?>>Jamaica</option>
                           <option label="Japan" value="JP" <?= ($author['country'] == 'JP') ? "selected" : ""; ?>>Japan</option>
                           <option label="Jersey" value="JE" <?= ($author['country'] == 'JE') ? "selected" : ""; ?>>Jersey</option>
                           <option label="Jordan" value="JO" <?= ($author['country'] == 'JO') ? "selected" : ""; ?>>Jordan</option>
                           <option label="Kazakhstan" value="KZ" <?= ($author['country'] == 'KZ') ? "selected" : ""; ?>>Kazakhstan</option>
                           <option label="Kenya" value="KE" <?= ($author['country'] == 'KE') ? "selected" : ""; ?>>Kenya</option>
                           <option label="Kiribati" value="KI" <?= ($author['country'] == 'KI') ? "selected" : ""; ?>>Kiribati</option>
                           <option label="Korea, Democratic People's Republic of" value="KP" <?= ($author['country'] == 'KP') ? "selected" : ""; ?>>Korea, Democratic People's Republic of</option>
                           <option label="Korea, Republic of" value="KR" <?= ($author['country'] == 'KR') ? "selected" : ""; ?>>Korea, Republic of</option>
                           <option label="Kuwait" value="KW" <?= ($author['country'] == 'KW') ? "selected" : ""; ?>>Kuwait</option>
                           <option label="Kyrgyzstan" value="KG" <?= ($author['country'] == 'KG') ? "selected" : ""; ?>>Kyrgyzstan</option>
                           <option label="Lao People's Democratic Republic" value="LA" <?= ($author['country'] == 'LA') ? "selected" : ""; ?>>Lao People's Democratic Republic</option>
                           <option label="Latvia" value="LV" <?= ($author['country'] == 'LV') ? "selected" : ""; ?>>Latvia</option>
                           <option label="Lebanon" value="LB" <?= ($author['country'] == 'LB') ? "selected" : ""; ?>>Lebanon</option>
                           <option label="Lesotho" value="LS" <?= ($author['country'] == 'LS') ? "selected" : ""; ?>>Lesotho</option>
                           <option label="Liberia" value="LR" <?= ($author['country'] == 'LR') ? "selected" : ""; ?>>Liberia</option>
                           <option label="Libya" value="LY" <?= ($author['country'] == 'LY') ? "selected" : ""; ?>>Libya</option>
                           <option label="Liechtenstein" value="LI" <?= ($author['country'] == 'LI') ? "selected" : ""; ?>>Liechtenstein</option>
                           <option label="Lithuania" value="LT" <?= ($author['country'] == 'LT') ? "selected" : ""; ?>>Lithuania</option>
                           <option label="Luxembourg" value="LU" <?= ($author['country'] == 'LU') ? "selected" : ""; ?>>Luxembourg</option>
                           <option label="Macao" value="MO" <?= ($author['country'] == 'MO') ? "selected" : ""; ?>>Macao</option>
                           <option label="Macedonia, the former Yugoslav Republic of" value="MK" <?= ($author['country'] == 'MK') ? "selected" : ""; ?>>Macedonia, the former Yugoslav Republic of</option>
                           <option label="Madagascar" value="MG" <?= ($author['country'] == 'MG') ? "selected" : ""; ?>>Madagascar</option>
                           <option label="Malawi" value="MW" <?= ($author['country'] == 'MW') ? "selected" : ""; ?>>Malawi</option>
                           <option label="Malaysia" value="MY" <?= ($author['country'] == 'MY') ? "selected" : ""; ?>>Malaysia</option>
                           <option label="Maldives" value="MV" <?= ($author['country'] == 'MV') ? "selected" : ""; ?>>Maldives</option>
                           <option label="Mali" value="ML" <?= ($author['country'] == 'ML') ? "selected" : ""; ?>>Mali</option>
                           <option label="Malta" value="MT" <?= ($author['country'] == 'MT') ? "selected" : ""; ?>>Malta</option>
                           <option label="Marshall Islands" value="MH" <?= ($author['country'] == 'MH') ? "selected" : ""; ?>>Marshall Islands</option>
                           <option label="Martinique" value="MQ" <?= ($author['country'] == 'MQ') ? "selected" : ""; ?>>Martinique</option>
                           <option label="Mauritania" value="MR" <?= ($author['country'] == 'MR') ? "selected" : ""; ?>>Mauritania</option>
                           <option label="Mauritius" value="MU" <?= ($author['country'] == 'MU') ? "selected" : ""; ?>>Mauritius</option>
                           <option label="Mayotte" value="YT" <?= ($author['country'] == 'YT') ? "selected" : ""; ?>>Mayotte</option>
                           <option label="Mexico" value="MX" <?= ($author['country'] == 'MX') ? "selected" : ""; ?>>Mexico</option>
                           <option label="Micronesia, Federated States of" value="FM" <?= ($author['country'] == 'FM') ? "selected" : ""; ?>>Micronesia, Federated States of</option>
                           <option label="Moldova, Republic of" value="MD" <?= ($author['country'] == 'MD') ? "selected" : ""; ?>>Moldova, Republic of</option>
                           <option label="Monaco" value="MC" <?= ($author['country'] == 'MC') ? "selected" : ""; ?>>Monaco</option>
                           <option label="Mongolia" value="MN" <?= ($author['country'] == 'MN') ? "selected" : ""; ?>>Mongolia</option>
                           <option label="Montenegro" value="ME" <?= ($author['country'] == 'ME') ? "selected" : ""; ?>>Montenegro</option>
                           <option label="Montserrat" value="MS" <?= ($author['country'] == 'MS') ? "selected" : ""; ?>>Montserrat</option>
                           <option label="Morocco" value="MA" <?= ($author['country'] == 'MA') ? "selected" : ""; ?>>Morocco</option>
                           <option label="Mozambique" value="MZ" <?= ($author['country'] == 'MZ') ? "selected" : ""; ?>>Mozambique</option>
                           <option label="Myanmar" value="MM" <?= ($author['country'] == 'MM') ? "selected" : ""; ?>>Myanmar</option>
                           <option label="Namibia" value="NA" <?= ($author['country'] == 'NA') ? "selected" : ""; ?>>Namibia</option>
                           <option label="Nauru" value="NR" <?= ($author['country'] == 'NR') ? "selected" : ""; ?>>Nauru</option>
                           <option label="Nepal" value="NP" <?= ($author['country'] == 'NP') ? "selected" : ""; ?>>Nepal</option>
                           <option label="Netherlands" value="NL" <?= ($author['country'] == 'NL') ? "selected" : ""; ?>>Netherlands</option>
                           <option label="Netherlands Antilles" value="AN" <?= ($author['country'] == 'AN') ? "selected" : ""; ?>>Netherlands Antilles</option>
                           <option label="New Caledonia" value="NC" <?= ($author['country'] == 'NC') ? "selected" : ""; ?>>New Caledonia</option>
                           <option label="New Zealand" value="NZ" <?= ($author['country'] == 'NZ') ? "selected" : ""; ?>>New Zealand</option>
                           <option label="Nicaragua" value="NI" <?= ($author['country'] == 'NI') ? "selected" : ""; ?>>Nicaragua</option>
                           <option label="Niger" value="NE" <?= ($author['country'] == 'NE') ? "selected" : ""; ?>>Niger</option>
                           <option label="Nigeria" value="NG" <?= ($author['country'] == 'NG') ? "selected" : ""; ?>>Nigeria</option>
                           <option label="Niue" value="NU" <?= ($author['country'] == 'NU') ? "selected" : ""; ?>>Niue</option>
                           <option label="Norfolk Island" value="NF" <?= ($author['country'] == 'NF') ? "selected" : ""; ?>>Norfolk Island</option>
                           <option label="Northern Mariana Islands" value="MP" <?= ($author['country'] == 'MP') ? "selected" : ""; ?>>Northern Mariana Islands</option>
                           <option label="Norway" value="NO" <?= ($author['country'] == 'NO') ? "selected" : ""; ?>>Norway</option>
                           <option label="Oman" value="OM" <?= ($author['country'] == 'OM') ? "selected" : ""; ?>>Oman</option>
                           <option label="Pakistan" value="PK" <?= ($author['country'] == 'PK') ? "selected" : ""; ?>>Pakistan</option>
                           <option label="Palau" value="PW" <?= ($author['country'] == 'PW') ? "selected" : ""; ?>>Palau</option>
                           <option label="Palestinian Territory, Occupied" value="PS" <?= ($author['country'] == 'PS') ? "selected" : ""; ?>>Palestinian Territory, Occupied</option>
                           <option label="Panama" value="PA" <?= ($author['country'] == 'PA') ? "selected" : ""; ?>>Panama</option>
                           <option label="Papua New Guinea" value="PG" <?= ($author['country'] == 'PG') ? "selected" : ""; ?>>Papua New Guinea</option>
                           <option label="Paraguay" value="PY" <?= ($author['country'] == 'PY') ? "selected" : ""; ?>>Paraguay</option>
                           <option label="Peru" value="PE" <?= ($author['country'] == 'PE') ? "selected" : ""; ?>>Peru</option>
                           <option label="Philippines" value="PH" <?= ($author['country'] == 'PH') ? "selected" : ""; ?>>Philippines</option>
                           <option label="Pitcairn" value="PN" <?= ($author['country'] == 'PN') ? "selected" : ""; ?>>Pitcairn</option>
                           <option label="Poland" value="PL" <?= ($author['country'] == 'PL') ? "selected" : ""; ?>>Poland</option>
                           <option label="Portugal" value="PT" <?= ($author['country'] == 'PT') ? "selected" : ""; ?>>Portugal</option>
                           <option label="Puerto Rico" value="PR" <?= ($author['country'] == 'PR') ? "selected" : ""; ?>>Puerto Rico</option>
                           <option label="Qatar" value="QA" <?= ($author['country'] == 'QA') ? "selected" : ""; ?>>Qatar</option>
                           <option label="Romania" value="RO" <?= ($author['country'] == 'RO') ? "selected" : ""; ?>>Romania</option>
                           <option label="Russian Federation" value="RU" <?= ($author['country'] == 'RU') ? "selected" : ""; ?>>Russian Federation</option>
                           <option label="Rwanda" value="RW" <?= ($author['country'] == 'RW') ? "selected" : ""; ?>>Rwanda</option>
                           <option label="Réunion" value="RE" <?= ($author['country'] == 'RE') ? "selected" : ""; ?>>Réunion</option>
                           <option label="Saint Barthélemy" value="BL" <?= ($author['country'] == 'BL') ? "selected" : ""; ?>>Saint Barthélemy</option>
                           <option label="Saint Helena, Ascension and Tristan da Cunha" value="SH" <?= ($author['country'] == 'SH') ? "selected" : ""; ?>>Saint Helena, Ascension and Tristan da Cunha</option>
                           <option label="Saint Kitts and Nevis" value="KN" <?= ($author['country'] == 'KN') ? "selected" : ""; ?>>Saint Kitts and Nevis</option>
                           <option label="Saint Lucia" value="LC" <?= ($author['country'] == 'LC') ? "selected" : ""; ?>>Saint Lucia</option>
                           <option label="Saint Martin (French part)" value="MF" <?= ($author['country'] == 'MF') ? "selected" : ""; ?>>Saint Martin (French part)</option>
                           <option label="Saint Pierre and Miquelon" value="PM" <?= ($author['country'] == 'PM') ? "selected" : ""; ?>>Saint Pierre and Miquelon</option>
                           <option label="Saint Vincent and the Grenadines" value="VC" <?= ($author['country'] == 'VC') ? "selected" : ""; ?>>Saint Vincent and the Grenadines</option>
                           <option label="Samoa" value="WS" <?= ($author['country'] == 'WS') ? "selected" : ""; ?>>Samoa</option>
                           <option label="San Marino" value="SM" <?= ($author['country'] == 'SM') ? "selected" : ""; ?>>San Marino</option>
                           <option label="Sao Tome and Principe" value="ST" <?= ($author['country'] == 'ST') ? "selected" : ""; ?>>Sao Tome and Principe</option>
                           <option label="Saudi Arabia" value="SA" <?= ($author['country'] == 'SA') ? "selected" : ""; ?>>Saudi Arabia</option>
                           <option label="Senegal" value="SN" <?= ($author['country'] == 'SN') ? "selected" : ""; ?>>Senegal</option>
                           <option label="Serbia" value="RS" <?= ($author['country'] == 'RS') ? "selected" : ""; ?>>Serbia</option>
                           <option label="Seychelles" value="SC" <?= ($author['country'] == 'SC') ? "selected" : ""; ?>>Seychelles</option>
                           <option label="Sierra Leone" value="SL" <?= ($author['country'] == 'SL') ? "selected" : ""; ?>>Sierra Leone</option>
                           <option label="Singapore" value="SG" <?= ($author['country'] == 'SG') ? "selected" : ""; ?>>Singapore</option>
                           <option label="Slovakia" value="SK" <?= ($author['country'] == 'SK') ? "selected" : ""; ?>>Slovakia</option>
                           <option label="Slovenia" value="SI" <?= ($author['country'] == 'SI') ? "selected" : ""; ?>>Slovenia</option>
                           <option label="Solomon Islands" value="SB" <?= ($author['country'] == 'SB') ? "selected" : ""; ?>>Solomon Islands</option>
                           <option label="Somalia" value="SO" <?= ($author['country'] == 'SO') ? "selected" : ""; ?>>Somalia</option>
                           <option label="South Africa" value="ZA" <?= ($author['country'] == 'ZA') ? "selected" : ""; ?>>South Africa</option>
                           <option label="South Georgia and the South Sandwich Islands" value="GS" <?= ($author['country'] == 'GS') ? "selected" : ""; ?>>South Georgia and the South Sandwich Islands</option>
                           <option label="Spain" value="ES" <?= ($author['country'] == 'ES') ? "selected" : ""; ?>>Spain</option>
                           <option label="Sri Lanka" value="LK" <?= ($author['country'] == 'LK') ? "selected" : ""; ?>>Sri Lanka</option>
                           <option label="Sudan" value="SD" <?= ($author['country'] == 'SD') ? "selected" : ""; ?>>Sudan</option>
                           <option label="Suriname" value="SR" <?= ($author['country'] == 'SR') ? "selected" : ""; ?>>Suriname</option>
                           <option label="Svalbard and Jan Mayen" value="SJ" <?= ($author['country'] == 'SJ') ? "selected" : ""; ?>>Svalbard and Jan Mayen</option>
                           <option label="Swaziland" value="SZ" <?= ($author['country'] == 'SZ') ? "selected" : ""; ?>>Swaziland</option>
                           <option label="Sweden" value="SE" <?= ($author['country'] == 'SE') ? "selected" : ""; ?>>Sweden</option>
                           <option label="Switzerland" value="CH" <?= ($author['country'] == 'CH') ? "selected" : ""; ?>>Switzerland</option>
                           <option label="Syrian Arab Republic" value="SY" <?= ($author['country'] == 'SY') ? "selected" : ""; ?>>Syrian Arab Republic</option>
                           <option label="Taiwan, Province of China" value="TW" <?= ($author['country'] == 'TW') ? "selected" : ""; ?>>Taiwan, Province of China</option>
                           <option label="Tajikistan" value="TJ" <?= ($author['country'] == 'TJ') ? "selected" : ""; ?>>Tajikistan</option>
                           <option label="Tanzania, United Republic of" value="TZ" <?= ($author['country'] == 'TZ') ? "selected" : ""; ?>>Tanzania, United Republic of</option>
                           <option label="Thailand" value="TH" <?= ($author['country'] == 'TH') ? "selected" : ""; ?>>Thailand</option>
                           <option label="Timor-Leste" value="TL" <?= ($author['country'] == 'TL') ? "selected" : ""; ?>>Timor-Leste</option>
                           <option label="Togo" value="TG" <?= ($author['country'] == 'TG') ? "selected" : ""; ?>>Togo</option>
                           <option label="Tokelau" value="TK" <?= ($author['country'] == 'TK') ? "selected" : ""; ?>>Tokelau</option>
                           <option label="Tonga" value="TO" <?= ($author['country'] == 'TO') ? "selected" : ""; ?>>Tonga</option>
                           <option label="Trinidad and Tobago" value="TT" <?= ($author['country'] == 'TT') ? "selected" : ""; ?>>Trinidad and Tobago</option>
                           <option label="Tunisia" value="TN" <?= ($author['country'] == 'TN') ? "selected" : ""; ?>>Tunisia</option>
                           <option label="Turkey" value="TR" <?= ($author['country'] == 'TR') ? "selected" : ""; ?>>Turkey</option>
                           <option label="Turkmenistan" value="TM" <?= ($author['country'] == 'TM') ? "selected" : ""; ?>>Turkmenistan</option>
                           <option label="Turks and Caicos Islands" value="TC" <?= ($author['country'] == 'TC') ? "selected" : ""; ?>>Turks and Caicos Islands</option>
                           <option label="Tuvalu" value="TV" <?= ($author['country'] == 'TV') ? "selected" : ""; ?>>Tuvalu</option>
                           <option label="Uganda" value="UG" <?= ($author['country'] == 'UG') ? "selected" : ""; ?>>Uganda</option>
                           <option label="Ukraine" value="UA" <?= ($author['country'] == 'UA') ? "selected" : ""; ?>>Ukraine</option>
                           <option label="United Arab Emirates" value="AE" <?= ($author['country'] == 'AE') ? "selected" : ""; ?>>United Arab Emirates</option>
                           <option label="United Kingdom" value="GB" <?= ($author['country'] == 'GB') ? "selected" : ""; ?>>United Kingdom</option>
                           <option label="United States" value="US" <?= ($author['country'] == 'US') ? "selected" : ""; ?>>United States</option>
                           <option label="United States Minor Outlying Islands" value="UM" <?= ($author['country'] == 'UM') ? "selected" : ""; ?>>United States Minor Outlying Islands</option>
                           <option label="Uruguay" value="UY" <?= ($author['country'] == 'UY') ? "selected" : ""; ?>>Uruguay</option>
                           <option label="Uzbekistan" value="UZ" <?= ($author['country'] == 'UZ') ? "selected" : ""; ?>>Uzbekistan</option>
                           <option label="Vanuatu" value="VU" <?= ($author['country'] == 'VU') ? "selected" : ""; ?>>Vanuatu</option>
                           <option label="Venezuela, Bolivarian Republic of" value="VE" <?= ($author['country'] == 'VE') ? "selected" : ""; ?>>Venezuela, Bolivarian Republic of</option>
                           <option label="Viet Nam" value="VN" <?= ($author['country'] == 'VN') ? "selected" : ""; ?>>Viet Nam</option>
                           <option label="Virgin Islands, British" value="VG" <?= ($author['country'] == 'VG') ? "selected" : ""; ?>>Virgin Islands, British</option>
                           <option label="Virgin Islands, U.S." value="VI" <?= ($author['country'] == 'VI') ? "selected" : ""; ?>>Virgin Islands, U.S.</option>
                           <option label="Wallis and Futuna" value="WF" <?= ($author['country'] == 'WF') ? "selected" : ""; ?>>Wallis and Futuna</option>
                           <option label="Western Sahara" value="EH" <?= ($author['country'] == 'EH') ? "selected" : ""; ?>>Western Sahara</option>
                           <option label="Yemen" value="YE" <?= ($author['country'] == 'YE') ? "selected" : ""; ?>>Yemen</option>
                           <option label="Zambia" value="ZM" <?= ($author['country'] == 'ZM') ? "selected" : ""; ?>>Zambia</option>
                           <option label="Zimbabwe" value="ZW" <?= ($author['country'] == 'ZW') ? "selected" : ""; ?>>Zimbabwe</option>
                           <option label="Åland Islands" value="AX" <?= ($author['country'] == 'AX') ? "selected" : ""; ?>>Åland Islands</option>
                        </select>
                     </td>
                  </tr>
                  <tr valign="top">
                     <td width="20%" class="label">
                        <label for="authors-0-biography">
                           Bio Statement </label>
                        <br />(E.g., department and rank)
                     </td>
                     <td width="80%" class="value"><textarea name="authors[<?= $index; ?>][biography]" class="textArea" id="authors-0-biography" rows="5" cols="40"><?php if (isset($author['author_id'])) echo $author['bio']; ?></textarea></td>
                  </tr>
               </table>
               <p><button type="button" onclick="location.href='<?= base_url('/author/removeAuthor/' . $author['author_id']); ?>'">Remove Author</button></p>
               <?php $index++; ?>
            <?php endforeach; ?>

            <input type="hidden" name="authors[<?= $index; ?>][authorId]" value="" />
            <table width="100%" class="data">
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-firstName">
                        First Name *</label>
                  </td>
                  <td width="80%" class="value"><input type="text" class="textField" name="authors[<?= $index; ?>][firstName]" id="authors-0-firstName" value="" size="20" maxlength="40" /></td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-middleName">
                        Middle Name </label>
                  </td>
                  <td width="80%" class="value"><input type="text" class="textField" name="authors[<?= $index; ?>][middleName]" id="authors-0-middleName" value="" size="20" maxlength="40" /></td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-lastName">
                        Last Name *</label>
                  </td>
                  <td width="80%" class="value"><input type="text" class="textField" name="authors[<?= $index; ?>][lastName]" id="authors-0-lastName" value="" size="20" maxlength="90" /></td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-email">
                        Email *</label>
                  </td>
                  <td width="80%" class="value"><input type="text" class="textField" name="authors[<?= $index; ?>][email]" id="authors-0-email" value="" size="30" maxlength="90" /></td>
               </tr>
               <tr valign="top">
                  <td class="label">
                     <label for="authors-0-url">
                        URL </label>
                  </td>
                  <td class="value"><input type="text" name="authors[<?= $index; ?>][url]" id="authors-0-url" value="" size="30" maxlength="255" class="textField" /></td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-affiliation">
                        Affiliation </label>
                  </td>
                  <td width="80%" class="value">
                     <textarea name="authors[<?= $index; ?>][affiliation]" class="textArea" id="authors-0-affiliation" rows="5" cols="40"></textarea><br />
                     <span class="instruct">(Your institution, e.g. "Simon Fraser University")</span>
                  </td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-country">
                        Country </label>
                  </td>
                  <td width="80%" class="value">
                     <select name="authors[<?= $index; ?>][country]" id="authors-0-country" class="selectMenu">
                        <option value=""></option>
                        <option label="Afghanistan" value="AF">Afghanistan</option>
                        <option label="Albania" value="AL">Albania</option>
                        <option label="Algeria" value="DZ">Algeria</option>
                        <option label="American Samoa" value="AS">American Samoa</option>
                        <option label="Andorra" value="AD">Andorra</option>
                        <option label="Angola" value="AO">Angola</option>
                        <option label="Anguilla" value="AI">Anguilla</option>
                        <option label="Antarctica" value="AQ">Antarctica</option>
                        <option label="Antigua and Barbuda" value="AG">Antigua and Barbuda</option>
                        <option label="Argentina" value="AR">Argentina</option>
                        <option label="Armenia" value="AM">Armenia</option>
                        <option label="Aruba" value="AW">Aruba</option>
                        <option label="Australia" value="AU">Australia</option>
                        <option label="Austria" value="AT">Austria</option>
                        <option label="Azerbaijan" value="AZ">Azerbaijan</option>
                        <option label="Bahamas" value="BS">Bahamas</option>
                        <option label="Bahrain" value="BH">Bahrain</option>
                        <option label="Bangladesh" value="BD">Bangladesh</option>
                        <option label="Barbados" value="BB">Barbados</option>
                        <option label="Belarus" value="BY">Belarus</option>
                        <option label="Belgium" value="BE">Belgium</option>
                        <option label="Belize" value="BZ">Belize</option>
                        <option label="Benin" value="BJ">Benin</option>
                        <option label="Bermuda" value="BM">Bermuda</option>
                        <option label="Bhutan" value="BT">Bhutan</option>
                        <option label="Bolivia, Plurinational State of" value="BO">Bolivia, Plurinational State of</option>
                        <option label="Bosnia and Herzegovina" value="BA">Bosnia and Herzegovina</option>
                        <option label="Botswana" value="BW">Botswana</option>
                        <option label="Bouvet Island" value="BV">Bouvet Island</option>
                        <option label="Brazil" value="BR">Brazil</option>
                        <option label="British Indian Ocean Territory" value="IO">British Indian Ocean Territory</option>
                        <option label="Brunei Darussalam" value="BN">Brunei Darussalam</option>
                        <option label="Bulgaria" value="BG">Bulgaria</option>
                        <option label="Burkina Faso" value="BF">Burkina Faso</option>
                        <option label="Burundi" value="BI">Burundi</option>
                        <option label="Cambodia" value="KH">Cambodia</option>
                        <option label="Cameroon" value="CM">Cameroon</option>
                        <option label="Canada" value="CA">Canada</option>
                        <option label="Cape Verde" value="CV">Cape Verde</option>
                        <option label="Cayman Islands" value="KY">Cayman Islands</option>
                        <option label="Central African Republic" value="CF">Central African Republic</option>
                        <option label="Chad" value="TD">Chad</option>
                        <option label="Chile" value="CL">Chile</option>
                        <option label="China" value="CN">China</option>
                        <option label="Christmas Island" value="CX">Christmas Island</option>
                        <option label="Cocos (Keeling) Islands" value="CC">Cocos (Keeling) Islands</option>
                        <option label="Colombia" value="CO">Colombia</option>
                        <option label="Comoros" value="KM">Comoros</option>
                        <option label="Congo" value="CG">Congo</option>
                        <option label="Congo, the Democratic Republic of the" value="CD">Congo, the Democratic Republic of the</option>
                        <option label="Cook Islands" value="CK">Cook Islands</option>
                        <option label="Costa Rica" value="CR">Costa Rica</option>
                        <option label="Croatia" value="HR">Croatia</option>
                        <option label="Cuba" value="CU">Cuba</option>
                        <option label="Cyprus" value="CY">Cyprus</option>
                        <option label="Czech Republic" value="CZ">Czech Republic</option>
                        <option label="Côte d'Ivoire" value="CI">Côte d'Ivoire</option>
                        <option label="Denmark" value="DK">Denmark</option>
                        <option label="Djibouti" value="DJ">Djibouti</option>
                        <option label="Dominica" value="DM">Dominica</option>
                        <option label="Dominican Republic" value="DO">Dominican Republic</option>
                        <option label="Ecuador" value="EC">Ecuador</option>
                        <option label="Egypt" value="EG">Egypt</option>
                        <option label="El Salvador" value="SV">El Salvador</option>
                        <option label="Equatorial Guinea" value="GQ">Equatorial Guinea</option>
                        <option label="Eritrea" value="ER">Eritrea</option>
                        <option label="Estonia" value="EE">Estonia</option>
                        <option label="Ethiopia" value="ET">Ethiopia</option>
                        <option label="Falkland Islands (Malvinas)" value="FK">Falkland Islands (Malvinas)</option>
                        <option label="Faroe Islands" value="FO">Faroe Islands</option>
                        <option label="Fiji" value="FJ">Fiji</option>
                        <option label="Finland" value="FI">Finland</option>
                        <option label="France" value="FR">France</option>
                        <option label="French Guiana" value="GF">French Guiana</option>
                        <option label="French Polynesia" value="PF">French Polynesia</option>
                        <option label="French Southern Territories" value="TF">French Southern Territories</option>
                        <option label="Gabon" value="GA">Gabon</option>
                        <option label="Gambia" value="GM">Gambia</option>
                        <option label="Georgia" value="GE">Georgia</option>
                        <option label="Germany" value="DE">Germany</option>
                        <option label="Ghana" value="GH">Ghana</option>
                        <option label="Gibraltar" value="GI">Gibraltar</option>
                        <option label="Greece" value="GR">Greece</option>
                        <option label="Greenland" value="GL">Greenland</option>
                        <option label="Grenada" value="GD">Grenada</option>
                        <option label="Guadeloupe" value="GP">Guadeloupe</option>
                        <option label="Guam" value="GU">Guam</option>
                        <option label="Guatemala" value="GT">Guatemala</option>
                        <option label="Guernsey" value="GG">Guernsey</option>
                        <option label="Guinea" value="GN">Guinea</option>
                        <option label="Guinea-Bissau" value="GW">Guinea-Bissau</option>
                        <option label="Guyana" value="GY">Guyana</option>
                        <option label="Haiti" value="HT">Haiti</option>
                        <option label="Heard Island and McDonald Islands" value="HM">Heard Island and McDonald Islands</option>
                        <option label="Holy See (Vatican City State)" value="VA">Holy See (Vatican City State)</option>
                        <option label="Honduras" value="HN">Honduras</option>
                        <option label="Hong Kong" value="HK">Hong Kong</option>
                        <option label="Hungary" value="HU">Hungary</option>
                        <option label="Iceland" value="IS">Iceland</option>
                        <option label="India" value="IN">India</option>
                        <option label="Indonesia" value="ID">Indonesia</option>
                        <option label="Iran, Islamic Republic of" value="IR">Iran, Islamic Republic of</option>
                        <option label="Iraq" value="IQ">Iraq</option>
                        <option label="Ireland" value="IE">Ireland</option>
                        <option label="Isle of Man" value="IM">Isle of Man</option>
                        <option label="Israel" value="IL">Israel</option>
                        <option label="Italy" value="IT">Italy</option>
                        <option label="Jamaica" value="JM">Jamaica</option>
                        <option label="Japan" value="JP">Japan</option>
                        <option label="Jersey" value="JE">Jersey</option>
                        <option label="Jordan" value="JO">Jordan</option>
                        <option label="Kazakhstan" value="KZ">Kazakhstan</option>
                        <option label="Kenya" value="KE">Kenya</option>
                        <option label="Kiribati" value="KI">Kiribati</option>
                        <option label="Korea, Democratic People's Republic of" value="KP">Korea, Democratic People's Republic of</option>
                        <option label="Korea, Republic of" value="KR">Korea, Republic of</option>
                        <option label="Kuwait" value="KW">Kuwait</option>
                        <option label="Kyrgyzstan" value="KG">Kyrgyzstan</option>
                        <option label="Lao People's Democratic Republic" value="LA">Lao People's Democratic Republic</option>
                        <option label="Latvia" value="LV">Latvia</option>
                        <option label="Lebanon" value="LB">Lebanon</option>
                        <option label="Lesotho" value="LS">Lesotho</option>
                        <option label="Liberia" value="LR">Liberia</option>
                        <option label="Libya" value="LY">Libya</option>
                        <option label="Liechtenstein" value="LI">Liechtenstein</option>
                        <option label="Lithuania" value="LT">Lithuania</option>
                        <option label="Luxembourg" value="LU">Luxembourg</option>
                        <option label="Macao" value="MO">Macao</option>
                        <option label="Macedonia, the former Yugoslav Republic of" value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option label="Madagascar" value="MG">Madagascar</option>
                        <option label="Malawi" value="MW">Malawi</option>
                        <option label="Malaysia" value="MY">Malaysia</option>
                        <option label="Maldives" value="MV">Maldives</option>
                        <option label="Mali" value="ML">Mali</option>
                        <option label="Malta" value="MT">Malta</option>
                        <option label="Marshall Islands" value="MH">Marshall Islands</option>
                        <option label="Martinique" value="MQ">Martinique</option>
                        <option label="Mauritania" value="MR">Mauritania</option>
                        <option label="Mauritius" value="MU">Mauritius</option>
                        <option label="Mayotte" value="YT">Mayotte</option>
                        <option label="Mexico" value="MX">Mexico</option>
                        <option label="Micronesia, Federated States of" value="FM">Micronesia, Federated States of</option>
                        <option label="Moldova, Republic of" value="MD">Moldova, Republic of</option>
                        <option label="Monaco" value="MC">Monaco</option>
                        <option label="Mongolia" value="MN">Mongolia</option>
                        <option label="Montenegro" value="ME">Montenegro</option>
                        <option label="Montserrat" value="MS">Montserrat</option>
                        <option label="Morocco" value="MA">Morocco</option>
                        <option label="Mozambique" value="MZ">Mozambique</option>
                        <option label="Myanmar" value="MM">Myanmar</option>
                        <option label="Namibia" value="NA">Namibia</option>
                        <option label="Nauru" value="NR">Nauru</option>
                        <option label="Nepal" value="NP">Nepal</option>
                        <option label="Netherlands" value="NL">Netherlands</option>
                        <option label="Netherlands Antilles" value="AN">Netherlands Antilles</option>
                        <option label="New Caledonia" value="NC">New Caledonia</option>
                        <option label="New Zealand" value="NZ">New Zealand</option>
                        <option label="Nicaragua" value="NI">Nicaragua</option>
                        <option label="Niger" value="NE">Niger</option>
                        <option label="Nigeria" value="NG">Nigeria</option>
                        <option label="Niue" value="NU">Niue</option>
                        <option label="Norfolk Island" value="NF">Norfolk Island</option>
                        <option label="Northern Mariana Islands" value="MP">Northern Mariana Islands</option>
                        <option label="Norway" value="NO">Norway</option>
                        <option label="Oman" value="OM">Oman</option>
                        <option label="Pakistan" value="PK">Pakistan</option>
                        <option label="Palau" value="PW">Palau</option>
                        <option label="Palestinian Territory, Occupied" value="PS">Palestinian Territory, Occupied</option>
                        <option label="Panama" value="PA">Panama</option>
                        <option label="Papua New Guinea" value="PG">Papua New Guinea</option>
                        <option label="Paraguay" value="PY">Paraguay</option>
                        <option label="Peru" value="PE">Peru</option>
                        <option label="Philippines" value="PH">Philippines</option>
                        <option label="Pitcairn" value="PN">Pitcairn</option>
                        <option label="Poland" value="PL">Poland</option>
                        <option label="Portugal" value="PT">Portugal</option>
                        <option label="Puerto Rico" value="PR">Puerto Rico</option>
                        <option label="Qatar" value="QA">Qatar</option>
                        <option label="Romania" value="RO">Romania</option>
                        <option label="Russian Federation" value="RU">Russian Federation</option>
                        <option label="Rwanda" value="RW">Rwanda</option>
                        <option label="Réunion" value="RE">Réunion</option>
                        <option label="Saint Barthélemy" value="BL">Saint Barthélemy</option>
                        <option label="Saint Helena, Ascension and Tristan da Cunha" value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option label="Saint Kitts and Nevis" value="KN">Saint Kitts and Nevis</option>
                        <option label="Saint Lucia" value="LC">Saint Lucia</option>
                        <option label="Saint Martin (French part)" value="MF">Saint Martin (French part)</option>
                        <option label="Saint Pierre and Miquelon" value="PM">Saint Pierre and Miquelon</option>
                        <option label="Saint Vincent and the Grenadines" value="VC">Saint Vincent and the Grenadines</option>
                        <option label="Samoa" value="WS">Samoa</option>
                        <option label="San Marino" value="SM">San Marino</option>
                        <option label="Sao Tome and Principe" value="ST">Sao Tome and Principe</option>
                        <option label="Saudi Arabia" value="SA">Saudi Arabia</option>
                        <option label="Senegal" value="SN">Senegal</option>
                        <option label="Serbia" value="RS">Serbia</option>
                        <option label="Seychelles" value="SC">Seychelles</option>
                        <option label="Sierra Leone" value="SL">Sierra Leone</option>
                        <option label="Singapore" value="SG">Singapore</option>
                        <option label="Slovakia" value="SK">Slovakia</option>
                        <option label="Slovenia" value="SI">Slovenia</option>
                        <option label="Solomon Islands" value="SB">Solomon Islands</option>
                        <option label="Somalia" value="SO">Somalia</option>
                        <option label="South Africa" value="ZA">South Africa</option>
                        <option label="South Georgia and the South Sandwich Islands" value="GS">South Georgia and the South Sandwich Islands</option>
                        <option label="Spain" value="ES">Spain</option>
                        <option label="Sri Lanka" value="LK">Sri Lanka</option>
                        <option label="Sudan" value="SD">Sudan</option>
                        <option label="Suriname" value="SR">Suriname</option>
                        <option label="Svalbard and Jan Mayen" value="SJ">Svalbard and Jan Mayen</option>
                        <option label="Swaziland" value="SZ">Swaziland</option>
                        <option label="Sweden" value="SE">Sweden</option>
                        <option label="Switzerland" value="CH">Switzerland</option>
                        <option label="Syrian Arab Republic" value="SY">Syrian Arab Republic</option>
                        <option label="Taiwan, Province of China" value="TW">Taiwan, Province of China</option>
                        <option label="Tajikistan" value="TJ">Tajikistan</option>
                        <option label="Tanzania, United Republic of" value="TZ">Tanzania, United Republic of</option>
                        <option label="Thailand" value="TH">Thailand</option>
                        <option label="Timor-Leste" value="TL">Timor-Leste</option>
                        <option label="Togo" value="TG">Togo</option>
                        <option label="Tokelau" value="TK">Tokelau</option>
                        <option label="Tonga" value="TO">Tonga</option>
                        <option label="Trinidad and Tobago" value="TT">Trinidad and Tobago</option>
                        <option label="Tunisia" value="TN">Tunisia</option>
                        <option label="Turkey" value="TR">Turkey</option>
                        <option label="Turkmenistan" value="TM">Turkmenistan</option>
                        <option label="Turks and Caicos Islands" value="TC">Turks and Caicos Islands</option>
                        <option label="Tuvalu" value="TV">Tuvalu</option>
                        <option label="Uganda" value="UG">Uganda</option>
                        <option label="Ukraine" value="UA">Ukraine</option>
                        <option label="United Arab Emirates" value="AE">United Arab Emirates</option>
                        <option label="United Kingdom" value="GB">United Kingdom</option>
                        <option label="United States" value="US">United States</option>
                        <option label="United States Minor Outlying Islands" value="UM">United States Minor Outlying Islands</option>
                        <option label="Uruguay" value="UY">Uruguay</option>
                        <option label="Uzbekistan" value="UZ">Uzbekistan</option>
                        <option label="Vanuatu" value="VU">Vanuatu</option>
                        <option label="Venezuela, Bolivarian Republic of" value="VE">Venezuela, Bolivarian Republic of</option>
                        <option label="Viet Nam" value="VN">Viet Nam</option>
                        <option label="Virgin Islands, British" value="VG">Virgin Islands, British</option>
                        <option label="Virgin Islands, U.S." value="VI">Virgin Islands, U.S.</option>
                        <option label="Wallis and Futuna" value="WF">Wallis and Futuna</option>
                        <option label="Western Sahara" value="EH">Western Sahara</option>
                        <option label="Yemen" value="YE">Yemen</option>
                        <option label="Zambia" value="ZM">Zambia</option>
                        <option label="Zimbabwe" value="ZW">Zimbabwe</option>
                        <option label="Åland Islands" value="AX">Åland Islands</option>
                     </select>
                  </td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-biography">
                        Bio Statement </label>
                     <br />(E.g., department and rank)
                  </td>
                  <td width="80%" class="value"><textarea name="authors[<?= $index; ?>][biography]" class="textArea" id="authors-0-biography" rows="5" cols="40"></textarea></td>
               </tr>
            </table>
            <p><input type="submit" class="button" name="addAuthor" value="Add Author" /></p>
         <?php else : ?>
            <input type="hidden" name="authors[0][authorId]" value="" />
            <table width="100%" class="data">
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-firstName">
                        First Name *</label>
                  </td>
                  <td width="80%" class="value"><input type="text" class="textField" name="authors[0][firstName]" id="authors-0-firstName" value="<?php if (isset($submitter['first_name'])) echo $submitter['first_name'];
                                                                                                                                                   else echo 'First Name'; ?>" size="20" maxlength="40" /></td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-middleName">
                        Middle Name </label>
                  </td>
                  <td width="80%" class="value"><input type="text" class="textField" name="authors[0][middleName]" id="authors-0-middleName" value="<?php if (isset($submitter['middle_name'])) echo $submitter['middle_name'] ?>" size="20" maxlength="40" /></td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-lastName">
                        Last Name *</label>
                  </td>
                  <td width="80%" class="value"><input type="text" class="textField" name="authors[0][lastName]" id="authors-0-lastName" value="<?php if (isset($submitter['last_name'])) echo $submitter['last_name'];
                                                                                                                                                else echo 'Last Name'; ?>" size="20" maxlength="90" /></td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-email">
                        Email *</label>
                  </td>
                  <td width="80%" class="value"><input type="text" class="textField" name="authors[0][email]" id="authors-0-email" value="" size="30" maxlength="90" /></td>
               </tr>
               <tr valign="top">
                  <td class="label">
                     <label for="authors-0-url">
                        URL </label>
                  </td>
                  <td class="value"><input type="text" name="authors[0][url]" id="authors-0-url" value="<?php if (isset($author['author_id'])) echo $author['url']; ?>" size="30" maxlength="255" class="textField" /></td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-affiliation">
                        Affiliation </label>
                  </td>
                  <td width="80%" class="value">
                     <textarea name="authors[0][affiliation]" class="textArea" id="authors-0-affiliation" rows="5" cols="40"><?php if (isset($author['author_id'])) echo $author['affiliation']; ?></textarea><br />
                     <span class="instruct">(Your institution, e.g. "Simon Fraser University")</span>
                  </td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-country">
                        Country </label>
                  </td>
                  <td width="80%" class="value">
                     <select name="authors[0][country]" id="authors-0-country" class="selectMenu">
                        <option value=""></option>
                        <option label="Afghanistan" value="AF">Afghanistan</option>
                        <option label="Albania" value="AL">Albania</option>
                        <option label="Algeria" value="DZ">Algeria</option>
                        <option label="American Samoa" value="AS">American Samoa</option>
                        <option label="Andorra" value="AD">Andorra</option>
                        <option label="Angola" value="AO">Angola</option>
                        <option label="Anguilla" value="AI">Anguilla</option>
                        <option label="Antarctica" value="AQ">Antarctica</option>
                        <option label="Antigua and Barbuda" value="AG">Antigua and Barbuda</option>
                        <option label="Argentina" value="AR">Argentina</option>
                        <option label="Armenia" value="AM">Armenia</option>
                        <option label="Aruba" value="AW">Aruba</option>
                        <option label="Australia" value="AU">Australia</option>
                        <option label="Austria" value="AT">Austria</option>
                        <option label="Azerbaijan" value="AZ">Azerbaijan</option>
                        <option label="Bahamas" value="BS">Bahamas</option>
                        <option label="Bahrain" value="BH">Bahrain</option>
                        <option label="Bangladesh" value="BD">Bangladesh</option>
                        <option label="Barbados" value="BB">Barbados</option>
                        <option label="Belarus" value="BY">Belarus</option>
                        <option label="Belgium" value="BE">Belgium</option>
                        <option label="Belize" value="BZ">Belize</option>
                        <option label="Benin" value="BJ">Benin</option>
                        <option label="Bermuda" value="BM">Bermuda</option>
                        <option label="Bhutan" value="BT">Bhutan</option>
                        <option label="Bolivia, Plurinational State of" value="BO">Bolivia, Plurinational State of</option>
                        <option label="Bosnia and Herzegovina" value="BA">Bosnia and Herzegovina</option>
                        <option label="Botswana" value="BW">Botswana</option>
                        <option label="Bouvet Island" value="BV">Bouvet Island</option>
                        <option label="Brazil" value="BR">Brazil</option>
                        <option label="British Indian Ocean Territory" value="IO">British Indian Ocean Territory</option>
                        <option label="Brunei Darussalam" value="BN">Brunei Darussalam</option>
                        <option label="Bulgaria" value="BG">Bulgaria</option>
                        <option label="Burkina Faso" value="BF">Burkina Faso</option>
                        <option label="Burundi" value="BI">Burundi</option>
                        <option label="Cambodia" value="KH">Cambodia</option>
                        <option label="Cameroon" value="CM">Cameroon</option>
                        <option label="Canada" value="CA">Canada</option>
                        <option label="Cape Verde" value="CV">Cape Verde</option>
                        <option label="Cayman Islands" value="KY">Cayman Islands</option>
                        <option label="Central African Republic" value="CF">Central African Republic</option>
                        <option label="Chad" value="TD">Chad</option>
                        <option label="Chile" value="CL">Chile</option>
                        <option label="China" value="CN">China</option>
                        <option label="Christmas Island" value="CX">Christmas Island</option>
                        <option label="Cocos (Keeling) Islands" value="CC">Cocos (Keeling) Islands</option>
                        <option label="Colombia" value="CO">Colombia</option>
                        <option label="Comoros" value="KM">Comoros</option>
                        <option label="Congo" value="CG">Congo</option>
                        <option label="Congo, the Democratic Republic of the" value="CD">Congo, the Democratic Republic of the</option>
                        <option label="Cook Islands" value="CK">Cook Islands</option>
                        <option label="Costa Rica" value="CR">Costa Rica</option>
                        <option label="Croatia" value="HR">Croatia</option>
                        <option label="Cuba" value="CU">Cuba</option>
                        <option label="Cyprus" value="CY">Cyprus</option>
                        <option label="Czech Republic" value="CZ">Czech Republic</option>
                        <option label="Côte d'Ivoire" value="CI">Côte d'Ivoire</option>
                        <option label="Denmark" value="DK">Denmark</option>
                        <option label="Djibouti" value="DJ">Djibouti</option>
                        <option label="Dominica" value="DM">Dominica</option>
                        <option label="Dominican Republic" value="DO">Dominican Republic</option>
                        <option label="Ecuador" value="EC">Ecuador</option>
                        <option label="Egypt" value="EG">Egypt</option>
                        <option label="El Salvador" value="SV">El Salvador</option>
                        <option label="Equatorial Guinea" value="GQ">Equatorial Guinea</option>
                        <option label="Eritrea" value="ER">Eritrea</option>
                        <option label="Estonia" value="EE">Estonia</option>
                        <option label="Ethiopia" value="ET">Ethiopia</option>
                        <option label="Falkland Islands (Malvinas)" value="FK">Falkland Islands (Malvinas)</option>
                        <option label="Faroe Islands" value="FO">Faroe Islands</option>
                        <option label="Fiji" value="FJ">Fiji</option>
                        <option label="Finland" value="FI">Finland</option>
                        <option label="France" value="FR">France</option>
                        <option label="French Guiana" value="GF">French Guiana</option>
                        <option label="French Polynesia" value="PF">French Polynesia</option>
                        <option label="French Southern Territories" value="TF">French Southern Territories</option>
                        <option label="Gabon" value="GA">Gabon</option>
                        <option label="Gambia" value="GM">Gambia</option>
                        <option label="Georgia" value="GE">Georgia</option>
                        <option label="Germany" value="DE">Germany</option>
                        <option label="Ghana" value="GH">Ghana</option>
                        <option label="Gibraltar" value="GI">Gibraltar</option>
                        <option label="Greece" value="GR">Greece</option>
                        <option label="Greenland" value="GL">Greenland</option>
                        <option label="Grenada" value="GD">Grenada</option>
                        <option label="Guadeloupe" value="GP">Guadeloupe</option>
                        <option label="Guam" value="GU">Guam</option>
                        <option label="Guatemala" value="GT">Guatemala</option>
                        <option label="Guernsey" value="GG">Guernsey</option>
                        <option label="Guinea" value="GN">Guinea</option>
                        <option label="Guinea-Bissau" value="GW">Guinea-Bissau</option>
                        <option label="Guyana" value="GY">Guyana</option>
                        <option label="Haiti" value="HT">Haiti</option>
                        <option label="Heard Island and McDonald Islands" value="HM">Heard Island and McDonald Islands</option>
                        <option label="Holy See (Vatican City State)" value="VA">Holy See (Vatican City State)</option>
                        <option label="Honduras" value="HN">Honduras</option>
                        <option label="Hong Kong" value="HK">Hong Kong</option>
                        <option label="Hungary" value="HU">Hungary</option>
                        <option label="Iceland" value="IS">Iceland</option>
                        <option label="India" value="IN">India</option>
                        <option label="Indonesia" value="ID">Indonesia</option>
                        <option label="Iran, Islamic Republic of" value="IR">Iran, Islamic Republic of</option>
                        <option label="Iraq" value="IQ">Iraq</option>
                        <option label="Ireland" value="IE">Ireland</option>
                        <option label="Isle of Man" value="IM">Isle of Man</option>
                        <option label="Israel" value="IL">Israel</option>
                        <option label="Italy" value="IT">Italy</option>
                        <option label="Jamaica" value="JM">Jamaica</option>
                        <option label="Japan" value="JP">Japan</option>
                        <option label="Jersey" value="JE">Jersey</option>
                        <option label="Jordan" value="JO">Jordan</option>
                        <option label="Kazakhstan" value="KZ">Kazakhstan</option>
                        <option label="Kenya" value="KE">Kenya</option>
                        <option label="Kiribati" value="KI">Kiribati</option>
                        <option label="Korea, Democratic People's Republic of" value="KP">Korea, Democratic People's Republic of</option>
                        <option label="Korea, Republic of" value="KR">Korea, Republic of</option>
                        <option label="Kuwait" value="KW">Kuwait</option>
                        <option label="Kyrgyzstan" value="KG">Kyrgyzstan</option>
                        <option label="Lao People's Democratic Republic" value="LA">Lao People's Democratic Republic</option>
                        <option label="Latvia" value="LV">Latvia</option>
                        <option label="Lebanon" value="LB">Lebanon</option>
                        <option label="Lesotho" value="LS">Lesotho</option>
                        <option label="Liberia" value="LR">Liberia</option>
                        <option label="Libya" value="LY">Libya</option>
                        <option label="Liechtenstein" value="LI">Liechtenstein</option>
                        <option label="Lithuania" value="LT">Lithuania</option>
                        <option label="Luxembourg" value="LU">Luxembourg</option>
                        <option label="Macao" value="MO">Macao</option>
                        <option label="Macedonia, the former Yugoslav Republic of" value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option label="Madagascar" value="MG">Madagascar</option>
                        <option label="Malawi" value="MW">Malawi</option>
                        <option label="Malaysia" value="MY">Malaysia</option>
                        <option label="Maldives" value="MV">Maldives</option>
                        <option label="Mali" value="ML">Mali</option>
                        <option label="Malta" value="MT">Malta</option>
                        <option label="Marshall Islands" value="MH">Marshall Islands</option>
                        <option label="Martinique" value="MQ">Martinique</option>
                        <option label="Mauritania" value="MR">Mauritania</option>
                        <option label="Mauritius" value="MU">Mauritius</option>
                        <option label="Mayotte" value="YT">Mayotte</option>
                        <option label="Mexico" value="MX">Mexico</option>
                        <option label="Micronesia, Federated States of" value="FM">Micronesia, Federated States of</option>
                        <option label="Moldova, Republic of" value="MD">Moldova, Republic of</option>
                        <option label="Monaco" value="MC">Monaco</option>
                        <option label="Mongolia" value="MN">Mongolia</option>
                        <option label="Montenegro" value="ME">Montenegro</option>
                        <option label="Montserrat" value="MS">Montserrat</option>
                        <option label="Morocco" value="MA">Morocco</option>
                        <option label="Mozambique" value="MZ">Mozambique</option>
                        <option label="Myanmar" value="MM">Myanmar</option>
                        <option label="Namibia" value="NA">Namibia</option>
                        <option label="Nauru" value="NR">Nauru</option>
                        <option label="Nepal" value="NP">Nepal</option>
                        <option label="Netherlands" value="NL">Netherlands</option>
                        <option label="Netherlands Antilles" value="AN">Netherlands Antilles</option>
                        <option label="New Caledonia" value="NC">New Caledonia</option>
                        <option label="New Zealand" value="NZ">New Zealand</option>
                        <option label="Nicaragua" value="NI">Nicaragua</option>
                        <option label="Niger" value="NE">Niger</option>
                        <option label="Nigeria" value="NG">Nigeria</option>
                        <option label="Niue" value="NU">Niue</option>
                        <option label="Norfolk Island" value="NF">Norfolk Island</option>
                        <option label="Northern Mariana Islands" value="MP">Northern Mariana Islands</option>
                        <option label="Norway" value="NO">Norway</option>
                        <option label="Oman" value="OM">Oman</option>
                        <option label="Pakistan" value="PK">Pakistan</option>
                        <option label="Palau" value="PW">Palau</option>
                        <option label="Palestinian Territory, Occupied" value="PS">Palestinian Territory, Occupied</option>
                        <option label="Panama" value="PA">Panama</option>
                        <option label="Papua New Guinea" value="PG">Papua New Guinea</option>
                        <option label="Paraguay" value="PY">Paraguay</option>
                        <option label="Peru" value="PE">Peru</option>
                        <option label="Philippines" value="PH">Philippines</option>
                        <option label="Pitcairn" value="PN">Pitcairn</option>
                        <option label="Poland" value="PL">Poland</option>
                        <option label="Portugal" value="PT">Portugal</option>
                        <option label="Puerto Rico" value="PR">Puerto Rico</option>
                        <option label="Qatar" value="QA">Qatar</option>
                        <option label="Romania" value="RO">Romania</option>
                        <option label="Russian Federation" value="RU">Russian Federation</option>
                        <option label="Rwanda" value="RW">Rwanda</option>
                        <option label="Réunion" value="RE">Réunion</option>
                        <option label="Saint Barthélemy" value="BL">Saint Barthélemy</option>
                        <option label="Saint Helena, Ascension and Tristan da Cunha" value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option label="Saint Kitts and Nevis" value="KN">Saint Kitts and Nevis</option>
                        <option label="Saint Lucia" value="LC">Saint Lucia</option>
                        <option label="Saint Martin (French part)" value="MF">Saint Martin (French part)</option>
                        <option label="Saint Pierre and Miquelon" value="PM">Saint Pierre and Miquelon</option>
                        <option label="Saint Vincent and the Grenadines" value="VC">Saint Vincent and the Grenadines</option>
                        <option label="Samoa" value="WS">Samoa</option>
                        <option label="San Marino" value="SM">San Marino</option>
                        <option label="Sao Tome and Principe" value="ST">Sao Tome and Principe</option>
                        <option label="Saudi Arabia" value="SA">Saudi Arabia</option>
                        <option label="Senegal" value="SN">Senegal</option>
                        <option label="Serbia" value="RS">Serbia</option>
                        <option label="Seychelles" value="SC">Seychelles</option>
                        <option label="Sierra Leone" value="SL">Sierra Leone</option>
                        <option label="Singapore" value="SG">Singapore</option>
                        <option label="Slovakia" value="SK">Slovakia</option>
                        <option label="Slovenia" value="SI">Slovenia</option>
                        <option label="Solomon Islands" value="SB">Solomon Islands</option>
                        <option label="Somalia" value="SO">Somalia</option>
                        <option label="South Africa" value="ZA">South Africa</option>
                        <option label="South Georgia and the South Sandwich Islands" value="GS">South Georgia and the South Sandwich Islands</option>
                        <option label="Spain" value="ES">Spain</option>
                        <option label="Sri Lanka" value="LK">Sri Lanka</option>
                        <option label="Sudan" value="SD">Sudan</option>
                        <option label="Suriname" value="SR">Suriname</option>
                        <option label="Svalbard and Jan Mayen" value="SJ">Svalbard and Jan Mayen</option>
                        <option label="Swaziland" value="SZ">Swaziland</option>
                        <option label="Sweden" value="SE">Sweden</option>
                        <option label="Switzerland" value="CH">Switzerland</option>
                        <option label="Syrian Arab Republic" value="SY">Syrian Arab Republic</option>
                        <option label="Taiwan, Province of China" value="TW">Taiwan, Province of China</option>
                        <option label="Tajikistan" value="TJ">Tajikistan</option>
                        <option label="Tanzania, United Republic of" value="TZ">Tanzania, United Republic of</option>
                        <option label="Thailand" value="TH">Thailand</option>
                        <option label="Timor-Leste" value="TL">Timor-Leste</option>
                        <option label="Togo" value="TG">Togo</option>
                        <option label="Tokelau" value="TK">Tokelau</option>
                        <option label="Tonga" value="TO">Tonga</option>
                        <option label="Trinidad and Tobago" value="TT">Trinidad and Tobago</option>
                        <option label="Tunisia" value="TN">Tunisia</option>
                        <option label="Turkey" value="TR">Turkey</option>
                        <option label="Turkmenistan" value="TM">Turkmenistan</option>
                        <option label="Turks and Caicos Islands" value="TC">Turks and Caicos Islands</option>
                        <option label="Tuvalu" value="TV">Tuvalu</option>
                        <option label="Uganda" value="UG">Uganda</option>
                        <option label="Ukraine" value="UA">Ukraine</option>
                        <option label="United Arab Emirates" value="AE">United Arab Emirates</option>
                        <option label="United Kingdom" value="GB">United Kingdom</option>
                        <option label="United States" value="US">United States</option>
                        <option label="United States Minor Outlying Islands" value="UM">United States Minor Outlying Islands</option>
                        <option label="Uruguay" value="UY">Uruguay</option>
                        <option label="Uzbekistan" value="UZ">Uzbekistan</option>
                        <option label="Vanuatu" value="VU">Vanuatu</option>
                        <option label="Venezuela, Bolivarian Republic of" value="VE">Venezuela, Bolivarian Republic of</option>
                        <option label="Viet Nam" value="VN">Viet Nam</option>
                        <option label="Virgin Islands, British" value="VG">Virgin Islands, British</option>
                        <option label="Virgin Islands, U.S." value="VI">Virgin Islands, U.S.</option>
                        <option label="Wallis and Futuna" value="WF">Wallis and Futuna</option>
                        <option label="Western Sahara" value="EH">Western Sahara</option>
                        <option label="Yemen" value="YE">Yemen</option>
                        <option label="Zambia" value="ZM">Zambia</option>
                        <option label="Zimbabwe" value="ZW">Zimbabwe</option>
                        <option label="Åland Islands" value="AX">Åland Islands</option>
                     </select>
                  </td>
               </tr>
               <tr valign="top">
                  <td width="20%" class="label">
                     <label for="authors-0-biography">
                        Bio Statement </label>
                     <br />(E.g., department and rank)
                  </td>
                  <td width="80%" class="value"><textarea name="authors[0][biography]" class="textArea" id="authors-0-biography" rows="5" cols="40"><?php if (isset($author['author_id'])) echo $author['bio']; ?></textarea></td>
               </tr>
            </table>
            <p><input type="submit" class="button" name="addAuthor" value="Add Author" /></p>
         <?php endif; ?>

      </div>
      <div class="separator"></div>
      <div id="titleAndAbstract">
         <h3>Title and Abstract</h3>
         <table width="100%" class="data">
            <tr valign="top">
               <td width="20%" class="label">
                  <label for="title">
                     Title *</label>
               </td>
               <td width="80%" class="value"><input type="text" class="textField" name="article[title]" id="title" value="<?php if (isset($article['article_id'])) echo $article['title']; ?>" size="60" maxlength="255" /></td>
            </tr>
            <tr valign="top">
               <td width="20%" class="label">
                  <label for="abstract">
                     Abstract *</label>
               </td>
               <td width="80%" class="value"><textarea name="article[abstract]" id="abstract" class="textArea" rows="15" cols="60"><?php if (isset($article['article_id'])) echo $article['abstract']; ?></textarea></td>
            </tr>
         </table>
      </div>
      <div class="separator"></div>
      <div id="indexing">
         <h3>Indexing</h3>
         <p>Provide terms for indexing the submission; separate terms with a semi-colon (term1; term2; term3).</p>
         <table width="100%" class="data">
            <tr valign="top">
               <td rowspan="2" width="20%" class="label">
                  <label for="subject">
                     Keywords </label>
               </td>
               <td width="80%" class="value"><input type="text" class="textField" name="article[keyword]" id="subject" value="<?php if (isset($article['article_id'])) echo $article['keyword']; ?>" size="40" maxlength="255" /></td>
            </tr>
            <tr valign="top">
               <td><span class="instruct">Photosynthesis; Black Holes; Four-Color Map Problem; Bayesian Theory</span></td>
            </tr>
            <tr valign="top">
               <td>&nbsp;</td>
               <td>&nbsp;</td>
            </tr>
            <tr valign="top">
               <td rowspan="2" width="20%" class="label">
                  <label for="language">
                     Language </label>
               </td>
               <td width="80%" class="value"><input type="text" class="textField" name="article[language]" id="language" value="<?php if (isset($article['article_id'])) echo $article['language'];
                                                                                                                                 else echo 'en'; ?>" size="5" maxlength="10" /></td>
            </tr>
            <tr valign="top">
               <td><span class="instruct">English=en; French=fr; Spanish=es. <a href="http://www.loc.gov/standards/iso639-2/php/code_list.php" target="_blank">Additional codes</a>.</span></td>
            </tr>
         </table>
      </div>
      <div class="separator"></div>
      <div id="submissionSupportingAgencies">
         <h3>Contributors and Supporting Agencies</h3>
         <p>Identify agencies (a person, an organization, or a service) that made contributions to the content or provided funding or support for the work presented in this submission. Separate them with a semi-colon (e.g. John Doe, Metro University; Master University, Department of Computer Science).</p>
         <table width="100%" class="data">
            <tr valign="top">
               <td width="20%" class="label">
                  <label for="sponsor">
                     Agencies </label>
               </td>
               <td width="80%" class="value"><input type="text" class="textField" name="article[sponsor]" id="sponsor" value="" size="60" maxlength="255" /></td>
            </tr>
         </table>
      </div>
      <div class="separator"></div>
      <div id="metaCitations">
         <h3>References</h3>
         <p>Provide a formatted list of references for works cited in this submission. Please separate individual references with a blank line.</p>
         <table width="100%" class="data">
            <tr valign="top">
               <td width="20%" class="label">
                  <label for="article[references]">
                     References </label>
               </td>
               <td width="80%" class="value"><textarea name="article[references]" id="citations" class="textArea" rows="15" cols="60"><?php if (isset($article['article_id'])) echo $article['reference']; ?></textarea></td>
            </tr>
         </table>
         <div class="separator"></div>
      </div>
      <p><input type="submit" name="submitArticle" value="Save and continue" class="button defaultButton" /> <input type="button" value="Cancel" class="button" onclick="confirmAction('/author', 'You can complete this submission at a later date by selecting Active Submissions from the Author home.')" /></p>
      <p><span class="formRequired">* Denotes required field</span></p>
   </form>
</div>

<?= $this->endSection(); ?>