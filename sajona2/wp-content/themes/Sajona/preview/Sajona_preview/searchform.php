<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<form id="search-2" class="data-control-id-3515 bd-searchwidget-2 form-inline" method="<?php echo isset($_GET['preview']) ? 'post' : 'get'; ?>" name="searchform" action="<?php echo esc_url( home_url() ); ?>/">
    <div class="bd-container-inner">
        <div class="bd-search-wrapper">
            
                
                <div class="bd-input-wrapper">
                    <input name="s" type="text" class="data-control-id-3506 bd-bootstrapinput-2 form-control" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="Search">
                </div>
                
                <div class="bd-button-wrapper">
                    <input type="submit" class="data-control-id-3505 bd-button" value="Search">
                </div>
        </div>
    </div>
    <input type="hidden" name="post_type" value="post" />
</form>