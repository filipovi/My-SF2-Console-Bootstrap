Feature: Console view
    In order to see if it works correctly
    As a console user
    I need to be able to do display the command results

    Scenario: Hello World with default value
        When I run "php console.php hello-world"
        Then I should see:
        """
        Hello World!
          option = 999
        """

    Scenario: Hello World with a different option value
        When I run "php console.php hello-world --option-with-value=1"
        Then I should see:
        """
        Hello World!
          option = 1
        """

    Scenario: Hello World with a no value option
        When I run "php console.php hello-world --option-no-value"
        Then I should see:
        """
        Hello World!
          option = 999
          with an option
        """

    Scenario: Hello World with a no value option and a different value option
        When I run "php console.php hello-world --option-no-value --option-with-value=2"
        Then I should see:
        """
        Hello World!
          option = 2
          with an option
        """

