<?php
    trait A
    {
        public function callName()
        {
            echo "This is callName 1" . PHP_EOL;
        }
        public function callNameWithOutEOL()
        {
            echo "This is callName 1";
        }
    }

    trait B
    {
        public function callName()
        {
            echo "This is callName 2";
        }
    }

    class useTraitCallName
    {
        use A, B
        {
            B::callName insteadof A;
        }

        public function methodOneUseMethodTwoTraitA()
        {
            return $this->callNameWithOutEOL();
        }
    
        public function methodTwoUseMethodOneTraitB()
        {
            return $this->callName();
        }
    }
    
    $obj = new useTraitCallName();
    echo $obj->methodOneUseMethodTwoTraitA(); 
    echo $obj->methodTwoUseMethodOneTraitB(); 

