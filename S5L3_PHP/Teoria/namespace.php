<?php

namespace Zend {

    class Test {
        public $message;

        function __construct($message) {
            $this->message = $message;
        }
    }

    class Form {
        public $field;

        function __construct($field) {
            $this->field = $field;
        }

        function getForm() {
            return "<form><label>$this->field</label><input type='text' name='$this->field'</form>";
        }

    }

}