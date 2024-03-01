<?php
    namespace FormGenerator {

        class Div {
            private $class;

            function __construct($class) {
                $this->class = $class;
            }
            public function startDiv() {
                return '<div class="'.$this->class.'">';
            }
            public function endDiv() {
                return '</div>';
            }
        }
        

        class Form {}

        class Label {
            private $for;
            private $txt;

            function __construct($for, $txt) {
                $this->for = $for;
                $this->txt = $txt;

            }
            public function getLabel() {
                return '<label for="'.$this->for.'">'.$this->txt.'</label>';
            }
            
        }

        class Input {
            private $type;
            private $class;
            private $id;
            private $placeholder;
            private $name;
            private $value;

            function __construct($type, $name, $class = '', $id = '', $placeholder = '', $value = '') {
                $this->type = $type;
                $this->name = $name;
                $this->class = $class;
                $this->id = $id;
                $this->placeholder = $placeholder;
                $this->value = $value;
            }

            public function getInput() {
                return '<input
                type="'. $this->type .'"
                class="'. $this->class .'"
                id="'. $this->id .'"
                placeholder="'. $this->placeholder .'"
                name="'. $this->name .'"
                value="'. $this->value .'"
              />';
            }

        }

        class Button {}

    }


    

