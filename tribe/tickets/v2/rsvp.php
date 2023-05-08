<?php
/**
 * Block: RSVP
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/tickets/v2/rsvp.php
 *
 * See more documentation about our Blocks Editor templating system.
 *
 * @link  https://evnt.is/1amp Help article for RSVP & Ticket template files.
 *
 * @since 4.12.3
 *
 * @version 5.0.0
 *
 * @var Tribe__Tickets__Editor__Template $this
 * @var WP_Post|int $post_id The post object or ID.
 * @var boolean $has_rsvps True if there are RSVPs.
 * @var array $active_rsvps An array containing the active RSVPs.
 * @var string $block_html_id The unique HTML id for the block.
 */

// We don't display anything if there is no RSVP.
if (!$has_rsvps) {
    return false;
}

// Bail if there are no active RSVP.
if (empty($active_rsvps)) {
    return;
}

?>

<div
        id="<?php echo esc_attr($block_html_id); ?>"
        class="tribe-common event-tickets"
>
    <?php
    if (is_user_logged_in()):
        foreach ($active_rsvps as $rsvp) : ?>
            <?php
            //check if user is logged in, if not, skip showing rsvp

            //check if rsvp should be shown to user. Don't show if user is not Leiter

            $show_not_going = tribe_is_truthy(get_post_meta($rsvp->ID, '_tribe_ticket_show_not_going', true));

            //get user's roles
            $user = wp_get_current_user();
            $roles = ( array )$user->roles;

            //define slug of role to access leiter_only events
            $leiter_role = "leiter";

            //if "not going" button should be shown and user is not leiter, skip this rsvp
            if ($show_not_going && !in_array($leiter_role, $roles)) {
                return;
            }
            ?>

            <div
                    class="tribe-tickets__rsvp-wrapper"
                    data-rsvp-id="<?php echo esc_attr($rsvp->ID); ?>"
            >
                <?php $this->template('v2/components/loader/loader'); ?>
                <?php $this->template('v2/rsvp/content', ['rsvp' => $rsvp]); ?>

            </div>
        <?php

        endforeach;
    endif; ?>
</div>
