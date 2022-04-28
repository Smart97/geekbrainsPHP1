<?php
    class product {
        private $title;
        private $description;
        private $price;

        public function __construct($title, $description, $price)
        {
            $this->title = $title;
            $this->description = $description;
            $this->price = $price;
        }
        public function getTitle() {
            return $this->title;
        }
        public function getDescription() {
            return $this->description;
        }
        public function getPrice() {
            return $this->price;
        }

        public function getInfo() {
            return 'Наименование: ' . $this->title . '<br>' . 
                    'Описание: ' . $this->description . '<br>' . 
                    'Цена: ' . $this->price . '<br>'; 
        }
    }

    class laptopProduct extends product {
        private $graphicCard;
        private $processor;

        public function __construct($title, $description, $price, $graphicCard, $processor)
        {
         parent::__construct($title, $description, $price);
         $this->graphicCard = $graphicCard;
         $this->processor = $processor;
        }
        public function getGraphicCard() {
            return $this->graphicCard;
        }
        public function getProcessor() {
            return $this->processor;
        }
        public function getInfo() {
            $info = parent::getInfo() . 'Видеокарта: ' . $this->graphicCard . '<br>' .
                                        'Процессор: ' . $this->processor . '<br>';
            return $info;
        }
    }

    $laptop = new laptopProduct('Macbook', 'Ноутбук компании apple', '150000', 'Apple M1 Pro 14-Core-GPU', 'M1 Pro');
    echo $laptop->getInfo();