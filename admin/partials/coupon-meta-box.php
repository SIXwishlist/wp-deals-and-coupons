<?php

wp_nonce_field('scb_dc_data', 'scb_dc_nonce');
?>
<table class="form-table">
    <tbody>
        <tr>
            <th scope="row">
                <label for="scb-coupon-type">
                    <?php _e('Coupon Type', 'scb_dc');?>
                </label>
            </th>
            <td>
                <select id="scb-coupon-type" name="scb-coupon-type">"
                    <?php foreach ( wp_deals_and_coupons()->coupons_types as $value => $label)
{
	?>
                    <option value="<?php echo ($value); ?>" <?php echo (@$meta_values['scb-coupon-type'][0] == $value ? 'selected' : ''); ?>>
                    <?php _e($label, 'scb_dc');?>
                    </option>
                    <?php }?>
                </select>
                <p class="description" id="scb-coupon-type-description">Coupon Type. Coupon will display a coupon code which will be copied when user clicks on it. Deal will display a link to get the deal instead of coupon code.</p>
            </td>
        </tr>
        <tr id="scb-coupon-code-row">
            <th scope="row">
                <label for="scb-coupon-code">
                    <?php _e('Coupon Code', 'scb_dc');?>
                </label>
            </th>
            <td>
                <input type="text" name="scb-coupon-code" id="scb-coupon-code" value="<?php echo (@$meta_values['scb-coupon-code'][0]); ?>">
                <p class="description" id="scb-coupon-code-description">Put your coupon code here. This will be copied when user clicks on it.</p>
            </td>
        </tr>
        <tr id="scb-coupon-deal-link-row" >
            <th scope="row">
                <label for="scb-coupon-deal-link">
                    <?php _e('Deal Link', 'scb_dc');?>
                </label>
            </th>
            <td>
                <input class="widefat"  type="url" name="scb-coupon-deal-link" id="scb-coupon-deal-link" value="<?php echo (@$meta_values['scb-coupon-deal-link'][0]); ?>">
                <p class="description" id="scb-coupon-deal-link-description">Link to be opened when clicked on coupon code. You can use your affiliate links.</p>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="scb-coupon-button-text">
                    <?php _e('Button Text', 'scb_dc');?>
                </label>
            </th>
            <td>
                <input type="text" name="scb-coupon-button-text" id="scb-coupon-button-text" value="<?php echo (@$meta_values['scb-coupon-button-text'][0]); ?>">
                <p class="description" id="scb-coupon-button-text-description">Deal button text. Put something like Get this Deal.</p>
            </td>
        </tr>

        <tr>

            <th scope="row">
                <label for="scb-coupon-text">
                    <?php _e('Coupon Text Line 1', 'scb_dc');?>
                </label>
            </th>
            <td>
                <input type="text" name="scb-coupon-text" id="scb-coupon-text" value="<?php echo (@$meta_values['scb-coupon-text'][0]); ?>">
                <p class="description" id="scb-coupon-text-description">Discount amount or text to be shown. Example: 60% Off.</p>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="scb-coupon-text-second">
                    <?php _e('Coupon Text Line 2', 'scb_dc');?>
                </label>
            </th>
            <td>
                <input type="text" name="scb-coupon-text-second" id="scb-coupon-text-second" value="<?php echo (@$meta_values['scb-coupon-text-second'][0]); ?>">
                <p class="description" id="scb-coupon-text-second-description">Discount amount or text to be shown. Example: 60% Off.</p>
            </td>
        </tr>
        <!--
        <tr>
            <th scope="row">
                <label for="scb-coupon-description">
                    <?php _e('Description', 'scb_dc');?>
                </label>
            </th>
            <td>
                <textarea  class="large-text code" name="scb-coupon-description" id="scb-coupon-description" rows="5"><?php echo (@$meta_values['scb-coupon-description'][0]); ?></textarea>
                <p class="description" id="scb-coupon-description-description">A little description so users know what the coupon code or deal is about.</p>
            </td>
        </tr>
    -->
        <tr>

            <th scope="row">
                <label for="scb-coupon-terms">
                    <?php _e('Terms &amp; Conditions', 'scb_dc');?>
                </label>
            </th>
            <td>
                <textarea class="large-text code" name="scb-coupon-terms" id="scb-coupon-terms" rows="5"><?php echo (@$meta_values['scb-coupon-terms'][0]); ?></textarea>
                <p class="description" id="scb-coupon-terms-description">Terms &amp; Conditions for this this Deal/Coupon</p>
            </td>
        </tr>
        <!--
        <tr>
            <th scope="row">
                <label for="scb-coupon-hide-expired">
                    <?php _e('Hide when Expired?', 'scb_dc');?>
                </label>
            </th>
            <td>
                <select id="scb-coupon-hide-expired" name="scb-coupon-hide-expired">"
                    <?php foreach ($coupons_hide as $value => $label)
{
	?>
                    <option value="<?php echo ($value); ?>"  <?php echo (@$meta_values['scb-coupon-hide-expired'][0] == $value ? 'selected' : ''); ?>>
                    <?php _e($label, 'scb_dc');?>
                    </option>
                    <?php }?>
                </select>
                <p class="description" id="scb-coupon-hide-expired-description">Display or hide when coupon/deal is expired</p>
            </td>
        </tr>
    -->
        <tr>
            <th scope="row">
                <label for="scb-coupon-expire-date">
                    <?php _e('Expiration date', 'scb_dc');?>
                </label>
            </th>
            <td>
                <input type="text" name="scb-coupon-expire-date" id="scb-coupon-expire-date" value="<?php echo (@$meta_values['scb-coupon-expire-date'][0]); ?>">
                <p class="description" id="scb-coupon-expire-date-description">Choose a date this coupon will expire. If you leave this blank, shortcode will show the message Doesn't expire.</p>
            </td>
        </tr>
    </tbody>
</table>
