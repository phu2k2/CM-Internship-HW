<?php
    trait A
    {
        public function callName()
        {
            echo "This is callName 1" . PHP_EOL;
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
        use callName, callName2
        {
            callName::callName insteadof callName2;
            callName::callName as callName1;
            callName2::callName as callName2; 
        }

        public function useMethodOneFromTrait1()
        {
            return $this->callName1();
        }
    
        public function useMethodTwoFromTrait2()
        {
            return $this->callName2();
        }
    }
    $obj = new useTraitCallName();
    echo $obj->useMethodOneFromTrait1(); 
    echo $obj->useMethodTwoFromTrait2(); 

