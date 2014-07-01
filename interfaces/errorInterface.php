<?php
/**
 * Interface for what needs to be logged.
 *
 * Anything that implements this interface will be injected in to the ErrorLogger library.
 *
 * @author Robert Gump
 * @version 0.5.0
 */
interface ErrorInterface
{
    public function getMessage();
}
