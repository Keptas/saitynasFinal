<?php

class Orders extends Controller {
    public function __construct() {
        parent::__construct();
        $this->OrderModel = $this->model('Order');
    }

    /**
     * @OA\Get(path="/restful/orders/getOrders", tags={"Orders"},
     * @OA\Response (response="200", description="Success"),
     * @OA\Response (response="404", description="Not Found, or Error occured"),
     * )
     */
    public function getOrders() {
        $data = $this->OrderModel->getOrders();

        return $this->response($data);
    }

    /**
     * @OA\Get(path="/restful/order/getOrder", tags={"Orders"},
     * @OA\Response (response="200", description="Success"),
     * @OA\Parameter(
     *   name="id",
     *   in="query",
     *   required=true,
     *   description="Id of ordder.",
     *   @Oa\Schema(
     *     type="integer"
     *   )
     * ),
     * @OA\Response (response="404", description="Not Found, or Error occured"),
     * )
     */
    public function getOrder(int $id) {
        $data = $this->OrderModel->getOrder($id);
        return $this->response($data);
    }

}