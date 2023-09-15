<?php 

namespace CLI\App\Controller;

class CategoryController{

    public function viewCategoryList(){
        echo "1. Family\n";
        echo "2. Business\n";
        echo "3. Charity\n";
        echo "4. Personal\n";
        echo "5. Job\n";
    }


    public function getCategoryList(){
        return [
            "1" => "Family",
            "2" => "Business",
            "3" => "Charity",
            "4" => "Personal",
            "5" => "Job"
        ];
    }

}