<?php

function redirect($destination)
{
    // handle URL
    if (preg_match("/^https?:\/\//", $destination))
    {
        header("Location: " . $destination);
    }

    // handle absolute path
    else if (preg_match("/^\//", $destination))
    {
        $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
        $host = $_SERVER["HTTP_HOST"];
        header("Location: $protocol://$host$destination");
    }

    // handle relative path
    else
    {
        // adapted from http://www.php.net/header
        $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
        $host = $_SERVER["HTTP_HOST"];
        $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
        header("Location: $protocol://$host$path/$destination");
    }

    // exit immediately since we're redirecting anyway
    exit;
}

function render($template, $values = array())
{
    // if template exists, render it
    if (file_exists("$template"))
    {
        // extract variables into local scope
        extract($values);

        // render header
        require("header.php");

        // render template
        require("$template");

        // render footer
        require("footer.php");
    }

    // else err
    else
    {
        print "could not render template";
    }
}

/**
 * Function to create and display error and success messages
 * @access public
 * @param string session name
 * @param string message
 * @param string display class
 * @return string message
 */
function flash( $flash = '', $message = '', $class = 'success fadeout-message' )
{
    //We can only do something if the name isn't empty
    if( !empty( $flash ) )
    {
        //No message, create it
        if( !empty( $message ) && empty( $_SESSION[$flash] ) )
        {
            if( !empty( $_SESSION[$flash] ) )
            {
                unset( $_SESSION[$flash] );
            }
            if( !empty( $_SESSION[$flash.'_class'] ) )
            {
                unset( $_SESSION[$flash.'_class'] );
            }

            $_SESSION[$flash] = $message;
            $_SESSION[$flash.'_class'] = $class;
        }
        //Message exists, display it
        elseif( !empty( $_SESSION[$flash] ) && empty( $message ) )
        {
            $class = !empty( $_SESSION[$flash.'_class'] ) ? $_SESSION[$flash.'_class'] : 'success';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$flash].'</div>';
            unset($_SESSION[$flash]);
            unset($_SESSION[$flash.'_class']);
        }
    }
}
?>