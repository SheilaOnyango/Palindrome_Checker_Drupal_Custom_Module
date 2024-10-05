<?php

namespace Drupal\palindrome_checker\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;

class PalindromeController extends ControllerBase {
  
  public function checkPalindrome(Request $request) {
    // Retrieving the word parameter from query string
    $word = $request->query->get('word');
    
    // Check if the word is null or empty
    if (empty($word)) {
      $message = "Please provide a word to check.";
    } else {
      // Use the isPalindrome method to check the word
      $message = $this->isPalindrome($word) ? 
                "Yes, \"$word\" is a palindrome!" : 
                "No, \"$word\" is not a palindrome.";
    }

    // Array rendering consisting the message
    return [
      '#theme' => 'palindrome_checker',
      '#message' => $message,
    ];
  }

  private function isPalindrome($word) {
    // Check if the word is the same forward and backwards
    return $word === strrev($word);
  }
}
