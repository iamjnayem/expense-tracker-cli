<?php 

namespace CLI\App\Controller;

require_once './app/controller/CategoryController.php';

use CLI\App\Controller\CategoryController;



class OperationController{

    protected $model;
    protected $entity;


    public function __construct($model, $entity)
    {
        $this->model = $model;
        $this->entity = $entity;
    }

    public function view(){
        $dataList = json_decode($this->model->all(), true);

        $categoryController = new CategoryController();
        $categoryList = $categoryController->getCategoryList();

        if($dataList != null){
            echo "\nHere is your $this->entity List\n\n";
            $total = 0;

            $paddedIdHeader = str_pad("Id", 20, " ", STR_PAD_RIGHT );
            $paddedAmountHeader = str_pad("Amount", 20, " ", STR_PAD_RIGHT);
            $paddedCategoryHeader = str_pad("Category", 20, " ", STR_PAD_RIGHT);
            $paddedDescriptionHeader = str_pad("Description",20, " ", STR_PAD_RIGHT);
            
            echo $paddedIdHeader . $paddedAmountHeader . $paddedCategoryHeader . $paddedDescriptionHeader . "\n";

            foreach($dataList as $entityItem){
                foreach($entityItem as $entityId => $entityDetails){

                        $total += $entityDetails['amount'];
                        $categoryName = $categoryList[$entityDetails['category_id']];


                        $paddedIdData = str_pad($entityId, 20, " ", STR_PAD_RIGHT);
                        $paddedAmountData = str_pad($entityDetails['amount'] , 20, " ", STR_PAD_RIGHT);
                        $paddedCategoryData = str_pad($categoryName, 20, " ", STR_PAD_RIGHT);
                        $paddedDescriptionData = str_pad($entityDetails['description'], 20, " ", STR_PAD_RIGHT );
                        echo $paddedIdData . $paddedAmountData . $paddedCategoryData . $paddedDescriptionData . "\n";
                }
            
            }
            echo "=================================================================\n";
            echo str_pad("Total", 20) . str_pad($total, 20) . "\n";
        }
        else{
            echo "Sorry, You didn't have add any $this->entity yet\n";
        }
    }

    public function add()
    {

        do{
            echo "Add your $this->entity\n";
            echo "Enter Amount: ";
            $amount = null;
    
            while(true){
                $amount = null;
                $amount = fgets(STDIN);
                if($amount <= 0) {
                    echo "Amount can't be 0 or less than zero\n";
                    echo "Enter Amount: ";
                    continue;
                }
                if(is_numeric($amount)){
                    break;
                }else{
                    echo "Note:*****Please Enter A Digit*******\n";
                    echo "Enter Amount: ";
                }
            }

            $amount = (int) trim($amount);


            switch(strtolower($this->entity)){
                case "income":
                    echo "Source: ";
                    break;
                case "expense" || "savings": 
                    echo "For: ";
                    break;
                default:
                    echo "Transaction For: ";
                    break;
                
            }
           
            $description = trim(fgets(STDIN));
            $categoryInput = null;
    
            $categoryController = new CategoryController();
            $categoryList = $categoryController->getCategoryList();
    
            while (true) {
                echo "Here is some category list: \n";
                $categoryController->viewCategoryList();
                echo "Please choose the category: \n";
                $categoryInput = trim(fgets(STDIN));
                if (in_array($categoryInput, array_keys($categoryList))) {
                    break;
                } else {
                    echo "You pressed wrong category\n";
                }
    
            }
    
            $id = $this->model->getLastId() + 1;
            
    
            $data = [
                $id => [
                    "amount" => $amount,
                    "description" => $description,
                    "category_id" => $categoryInput,
                ],
            ];
    
            $this->model->insert($data);

            echo "\n$this->entity has added Successfully!!!\n\n";
            echo "Do you want to add more?\n";
            echo "Yes: press 1\n";
            echo "No: press any key\n";
            $more = (int)fgets(STDIN);

        }while($more == 1);

       

    }
}
