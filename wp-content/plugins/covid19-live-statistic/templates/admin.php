<?php
$data = get_option('mmscovidlive_countries');
?>

<div id="mmscovidlive">
    <h1><?php esc_html_e('Documentation', 'mmscovidlive'); ?></h1>
    <h3><?php esc_html_e('Countries', 'mmscovidlive'); ?></h3>
    <select name="covid_countries">
        <option value=""><?php esc_html_e('========== Global ==========', 'mmscovidlive'); ?></option>
        <?php
        foreach ($data as $item) {
            echo '<option value="'.$item->country.'">'.$item->country.'</option>';
        }
        ?>
    </select>
    <h3><?php esc_html_e('Shortcode', 'mmscovidlive'); ?></h3>
    <code id="covid_shortcode"><?php esc_html_e('[mmscovidlive]', 'mmscovidlive'); ?></code>
    <p><i><?php esc_html_e('Copy & paste this shortcode into post, page or widget.', 'mmscovidlive'); ?></i></p>
    <h3><?php esc_html_e('Attributes', 'mmscovidlive'); ?></h3>
    <ul class="covid-attributes">
        <li><strong><?php esc_html_e('title:', 'mmscovidlive'); ?></strong> <?php esc_html_e('Title of box - default is "Global"', 'mmscovidlive'); ?></li>
        <li><strong><?php esc_html_e('label_confirmed:', 'mmscovidlive'); ?></strong> <?php esc_html_e('Label Confirmed - default is "Confirmed"', 'mmscovidlive'); ?></li>
        <li><strong><?php esc_html_e('label_deaths:', 'mmscovidlive'); ?></strong> <?php esc_html_e('Label Deaths - default is "Deaths"', 'mmscovidlive'); ?></li>
        <li><strong><?php esc_html_e('label_recovered:', 'mmscovidlive'); ?></strong> <?php esc_html_e('Label Recovered - default is "Recovered"', 'mmscovidlive'); ?></li>
        <li><strong><?php esc_html_e('style:', 'mmscovidlive'); ?></strong> <?php esc_html_e('Availible styles: default, 2, 3, 4'); ?></li>
    </ul>
    <strong><?php esc_html_e('Example:', 'mmscovidlive'); ?></strong><br/>
    <code><?php esc_html_e('[mmscovidlive country="Vietnam" title="Global" style="2" label_confirmed="Confirmed" label_deaths="Deaths" label_recovered="Recovered"]', 'mmscovidlive'); ?></code>

</div>