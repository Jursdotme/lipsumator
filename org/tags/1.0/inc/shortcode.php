<?php
// Add Shortcode
function lipsumator_func($atts)
{

    // Attributes
    $atts = shortcode_atts(
        array(
            'type' => 's',
            'count' => '1',
            'tag' => 'p',
        ),
        $atts
    );

    $lipsum = new joshtronic\LoremIpsum();

    switch ($atts['type']) {
        case 'p':
            $output = $lipsum->paragraphs($atts['count'], $atts['tag']);
            break;
        case 's':
            $output = $lipsum->sentences($atts['count'], $atts['tag']);
            break;
        case 'w':
            $output = $lipsum->words($atts['count']);
            $output = '<' . $atts['tag'] . '>' . $output . '</' . $atts['tag'] . '>';
            break;
        default:
            $output = sprintf('<pre>Error! "' . $atts['type'] . '" ' . __('is not a valid type. Use "p","s" or "w".', 'lipsumator') . '</pre>');
            break;
    }

    $output = ucfirst($output);

    $options = get_option('lipsumator_options');

    if (isset($options['highlight'])) {
        $output = '<span class="lorem-ipsum-highlight">' . $output . '</span>';
    }

    //$output = wpautop($output);

    return $output;

    
}
add_shortcode('lipsumator', 'lipsumator_func');
