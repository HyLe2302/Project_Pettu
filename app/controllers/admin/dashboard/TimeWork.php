<?php
class TimeWork extends Controller {
    private $timeWorkModel;

    public function __construct() {
        $this->timeWorkModel = $this->model('TimeWorkModel', 'admin');
    }

    // Lấy danh sách thời gian làm việc
    public function getListTimeWork() {
        $request = new Request();

        if ($request->isGet()): // Kiểm tra get
            
            $result = $this->timeWorkModel->handleGetListTimeWork(); // Gọi xử lý ở Model

            if (!empty($result)):
                $response = [
                    'status' =>true,
                    'data'=> $result
                ];
            else:
                $response = [
                    'message' => 'Đã có lỗi xảy ra'
                ];
            endif;

            echo json_encode($response);
        endif;
    }

    // ADD Time Working
    public function addTimeWork(){
        $request = new Request();
        $response =[];

        if ($request->isPost()):
            $data = $request->getFields();

            if(!empty($data)):
                $request->rules([
                    'timeworking' => 'required',
                ]);

                $request->message([
                    'timeworking.required' =>'thời gian làm việc không được để trống.',
                ]);

                $validate = $request->validate();

                if($validate):
                    $result = $this->timeWorkModel->handleAddTimeWork($data);

                    if($result):
                        $response = [
                            'status'=> true,
                            'message' => 'Thêm thành công'
                        ];
                    else:
                        $response = [
                            'status'=> false,
                            'message' => 'Thêm thất bại'
                        ];
                    endif;
                else:
                    $response = [
                        'status' => false,
                        'errors' => Session :: flash('pettu_session_errors')
                    ];
                endif;

                echo json_encode($response);
            endif;
        endif;

    }
    
    // //Update thông tin sản phẩm
    // public function updateProduct() {
    //     $request = new Request();

    //     if ($request->isPost()): // Kiểm tra get
    //         $data = $request->getFields();

    //         $request->rules([
    //             'product_name' => 'required|min:6',
    //             'price' => 'required',
    //             'quantity' => 'required',
    //             'color' => 'required',
    //             'evaluate_quantity' => 'required',
    //             'product_status' => 'required',
    //         ]);

    //         $request->message([
    //             'product_name.required' =>'Tên sản phẩm không được để trống.',
    //             'product_name.min' =>'Tên sản phẩm không ít hơn 5 kí tự.',
    //             'price.required' =>'Giá sản phẩm không được để trống.',
    //             'quantity.required' =>'Số lượng sản phẩm không được để trống.',
    //             'color.required' =>'Màu sản phẩm không được để trống.',
    //             'evaluate_quantity.required' =>'Số lượng đánh giá không được để trống.',
    //             'product_status.required' =>'Trạng thái sản phẩm không được để trống.',
    //         ]);

    //         $validate = $request->validate();

    //         if($validate):
    //             if (!empty($data['productid'])):
    //                 $productId = $data['productid'];
    
    //                 $result = $this->productModel->handleUpdateProduct($productId); // Gọi xử lý ở Model
    
    //                 if (!empty($result)):
    //                     $response = [
    //                         'message' => 'Thay đổi thành công',
    //                     ];
    //                 else:
    //                     $response = [
    //                         'message' => 'Đã có lỗi xảy ra'
    //                     ];
    //                 endif;
    //             else:
    //                 $response = [
    //                     'message' => 'Đã có lỗi xảy ra!'
    //                 ];
    //             endif;
    
    //             echo json_encode($response);
    //         endif;
    //     endif;
    // }


    // // DELETE PRODUCT
    // public function deleteProduct(){
    //     $request = new Request();

    //     if ($request->isPost()): // Kiểm tra get
    //         $data = $request->getFields();

    //         if (!empty($data['productid'])):
    //             $productId = $data['productid'];

    //             $result = $this->productModel->handleDeleteProduct($productId); // Gọi xử lý ở Model

    //             if (!empty($result)):
    //                 $response = [
    //                     'message' => 'Xóa thành công',
    //                 ];
    //             else:
    //                 $response = [
    //                     'message' => 'Đã có lỗi xảy ra'
    //                 ];
    //             endif;
    //         else:
    //             $response = [
    //                 'message' => 'Đã có lỗi xảy ra!'
    //             ];
    //         endif;

    //         echo json_encode($response);
           
    //     endif;
    // }
}