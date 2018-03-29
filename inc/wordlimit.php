<?php 

function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
}

$content = 'Once the Flash message has been set, I redirect the user to the form or a list of results. That is needed in order to get the flash working (you cannot just load the view in this case… well, you can but this method will not work in such case). When comparing $result TRUE or FALSE, please notice the different value for type. I am using type=message for successful messages, and type=error for error mesages.' ; 

echo limit_words($content,20);

function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }

    echo '<br><br><br><br><br><br><br>';

echo limit_text('Hello here is a long sentence blah blah blah blah blah hahahaha haha haaaaaa', 5);

