<?php
/**
 * The Template for displaying all single course meta information.
 *
 * Override this template by copying it to yourtheme/sensei/single-course/course-lessons.php
 *
 * @author 		WooThemes
 * @package 	Sensei/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $post, $woothemes_sensei, $current_user;

$html = '';
// Get Course Lessons
$lessons_completed = 0;
$course_lessons = $woothemes_sensei->frontend->course->course_lessons( $post->ID );
$total_lessons = count( $course_lessons );
// Check if the user is taking the course

$is_user_taking_course = WooThemes_Sensei_Utils::sensei_check_for_activity( array( 'post_id' => $post->ID, 'user_id' => $current_user->ID, 'type' => 'sensei_course_status' ) );

// Get User Meta
get_currentuserinfo();

if ( 0 < $total_lessons ) {

    $html .= '<section class="course-lessons">';

    	$html .= '<header>';

            $html .= '<h2>' . apply_filters( 'sensei_lessons_text', __( 'THE COURSE LESSONS', 'woothemes-sensei' ) ) . '</h2>';

    	$html .= '</header>';

    	$lesson_count = 1;
    	$lessons_completed = 0;
        $show_lesson_numbers = false;

    	foreach ( $course_lessons as $lesson_item ){
			$single_lesson_complete = false;
			$post_classes = array( 'course', 'post' );
			$user_lesson_status = false;
			if ( is_user_logged_in() ) {
				// Check if Lesson is complete
				$user_lesson_status = WooThemes_Sensei_Utils::user_lesson_status( $lesson_item->ID, $current_user->ID );
				$single_lesson_complete = WooThemes_Sensei_Utils::user_completed_lesson( $user_lesson_status );
				if ( $single_lesson_complete ) {
					$lessons_completed++;
					$post_classes[] = 'lesson-completed';
				} // End If Statement
			} // End If Statement

    	    // Get Lesson data
    	    $complexity_array = $woothemes_sensei->frontend->lesson->lesson_complexities();
    	    $lesson_length = get_post_meta( $lesson_item->ID, '_lesson_length', true );
    	    $lesson_complexity = get_post_meta( $lesson_item->ID, '_lesson_complexity', true );
    	    if ( '' != $lesson_complexity ) { $lesson_complexity = $complexity_array[$lesson_complexity]; }
    	    $user_info = get_userdata( absint( $lesson_item->post_author ) );
            $is_preview = WooThemes_Sensei_Utils::is_preview_lesson( $lesson_item->ID );
            $preview_label = '';
            if ( $is_preview && !$is_user_taking_course ) {
                $preview_label = $woothemes_sensei->frontend->sensei_lesson_preview_title_text( $post->ID );
                $preview_label = '<span class="preview-heading">' . $preview_label . '</span>';
                $post_classes[] = 'lesson-preview';
            }

    	    $html .= '<article class="' . esc_attr( join( ' ', get_post_class( $post_classes, $lesson_item->ID ) ) ) . '">';

    			$html .= '<header>';
                    $lesson_prerequisite = absint( get_post_meta( $lesson_item->ID, '_lesson_prerequisite', true ) );


                    if ( $lesson_prerequisite > 0 ) {
                        // Check for prerequisite lesson completions
                        $view_lesson = WooThemes_Sensei_Utils::user_completed_lesson( $lesson_prerequisite, $current_user->ID );
                    }

                    if($lesson_prerequisite == 0)
                        $view_lesson = 1;

                    if($view_lesson && $is_user_taking_course) {
                        $html .= '<h2><a href="' . esc_url( get_permalink( $lesson_item->ID ) ) . '" title="' . esc_attr( sprintf( __( 'Start %s', 'woothemes-sensei' ), $lesson_item->post_title ) ) . '">';    
                        $html .= esc_html( sprintf( __( '%s', 'woothemes-sensei' ), $lesson_item->post_title ) ) . $preview_label . '</a></h2>';
                    } else {
                        $html .= '<h2 class="locked">'. $lesson_item->post_title . '</h2>';    
                    }
    	    		

                    if( apply_filters( 'sensei_show_lesson_numbers', $show_lesson_numbers ) ) {
                        $html .= '<span class="lesson-number">' . $lesson_count . '. </span>';
                    }


    	    		$html .= '<p class="lesson-meta">';

    	   		 		if ( '' != $lesson_length ) { $html .= '<span class="lesson-length">' . apply_filters( 'sensei_length_text', __( 'Length: ', 'woothemes-sensei' ) ) . $lesson_length . __( ' minutes', 'woothemes-sensei' ) . '</span>'; }
    	   		 		if ( isset( $woothemes_sensei->settings->settings[ 'lesson_author' ] ) && ( $woothemes_sensei->settings->settings[ 'lesson_author' ] ) ) {
    	   		 			$html .= '<span class="lesson-author">' . apply_filters( 'sensei_author_text', __( 'Author: ', 'woothemes-sensei' ) ) . '<a href="' . get_author_posts_url( absint( $lesson_item->post_author ) ) . '" title="' . esc_attr( $user_info->display_name ) . '">' . esc_html( $user_info->display_name ) . '</a></span>';
    	   		 		} // End If Statement
    	   		 		if ( '' != $lesson_complexity ) { $html .= '<span class="lesson-complexity">' . apply_filters( 'sensei_complexity_text', __( 'Complexity: ', 'woothemes-sensei' ) ) . $lesson_complexity .'</span>'; }

						if ( $single_lesson_complete ) {
							$html .= '<span class="lesson-status complete">' . apply_filters( 'sensei_complete_text', __( 'Complete', 'woothemes-sensei' ) ) .'</span>';
						}
						elseif ( $user_lesson_status ) {
							$html .= '<span class="lesson-status in-progress">' . apply_filters( 'sensei_in_progress_text', __( 'In Progress', 'woothemes-sensei' ) ) .'</span>';
						} // End If Statement

    	   		 	$html .= '</p>';

    			$html .= '</header>';

    			// Image
    			$html .=  $woothemes_sensei->post_types->lesson->lesson_image( $lesson_item->ID );

    			$html .= '<section class="entry">';

                    $html .= WooThemes_Sensei_Lesson::lesson_excerpt( $lesson_item );

    	   		$html .= '</section>';

    	    $html .= '</article>';

    	    $lesson_count++;

    	} // End For Loop

    	

    $html .= '</section>';

} // End If Statement
// Output the HTML
echo $html; ?>