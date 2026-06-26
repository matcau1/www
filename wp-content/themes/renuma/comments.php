<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

  <?php if ( have_comments() ) : ?>
      <div class="comments-area">
        <div class="title-g mb-5">
          <h3><?php comments_number( esc_html__('0 Comments', 'renuma'), esc_html__('1 Comment', 'renuma'), esc_html__('% Comments', 'renuma') ); ?></h3>
        </div>
        <ol class="comment-list">
            <?php wp_list_comments('callback=renuma_theme_comment'); ?>
        </ol>
      </div>
          <!-- START PAGINATION -->
      <?php
          if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
      ?>
      <div class="pagination_area">
           <nav>
                <ul class="pagination">
                    <li><?php paginate_comments_links( 
                        array(
                        'prev_text' => wp_specialchars_decode('<i class="fa fa-angle-left"></i>',ENT_QUOTES),
                        'next_text' => wp_specialchars_decode('<i class="fa fa-angle-right"></i>',ENT_QUOTES),
                        ));  ?>
                    </li>
                </ul>
           </nav>
      </div>
    <?php endif; ?>
    <!-- END PAGINATION --> 
  <?php endif; ?>                    
  <?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                'id_form' => 'contacts-form',        
                'class_form' => 'conatct-post-form',                         
                'title_reply'=> esc_html__( 'Leave a comment', 'renuma' ),
                'fields' => apply_filters( 'comment_form_default_fields', array(
                    'author' =>   ' <div class="row"> <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="author" placeholder="'.esc_attr__('Your Name', 'renuma').' " required="required" data-error="'.esc_attr__('Name is required.', 'renuma').'">
                                        </div>
                                    </div>',
                    'email' =>    ' <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="'.esc_attr__('Your Email', 'renuma').'" required="required" data-error="'.esc_attr__('Email is required.', 'renuma').'">
                                        </div>
                                    </div></div>',

                ) ),   
                'comment_field' => '  <div class="form-group">
                                          <div class="contact-icon contacts--message">
                                              <textarea name="comment" class="form-control"  '.$aria_req.' cols="30" rows="6" placeholder="'.esc_attr__('Write a comment', 'renuma').'" required="required" data-error="'.esc_attr__('Please,leave us a message.', 'renuma').'"></textarea>
                                          </div>
                                      </div>',                
                'label_submit' => esc_html__( 'Post a comment', 'renuma' ),
                'comment_notes_before' => '',
                'comment_notes_after' => '',               
        )
  ?>

  <?php if ( comments_open() ) : ?>
    <?php comment_form($comment_args); ?>
  <?php endif; ?> 