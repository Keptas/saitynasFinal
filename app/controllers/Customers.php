<?php

class Customers extends Controller {
    public function __construct() {
        parent::__construct();
        $this->CustomerModel = $this->model('Customer');
    }

    /**
     * @OA\Get(path="/restful/customers/getCustomers", tags={"Customers"},
     * @OA\Response (response="200", description="Success"),
     * @OA\Response (response="404", description="Not Found, or Error occured"),
     * )
     */
    public function getCustomers() {
        $data = $this->CustomerModel->getCustomers();

        return $this->response($data);
    }

    /**
     * @OA\Get(path="/restful/customers/getCustomer", tags={"Customers"},
     * @OA\Response (response="200", description="Success"),
     * @OA\Parameter(
     *   name="id",
     *   in="query",
     *   required=true,
     *   description="Customer ID",
     *   @Oa\Schema(
     *     type="integer"
     *   )
     * ),
     * @OA\Response (response="404", description="Not Found, or Error occured"),
     * )
     */
    public function getCustomer(int $id) {
        $data = $this->CustomerModel->getCustomer($id);
        return $this->response($data);
    }
    
    /**
    * @OA\Post(path="/restful/customers/insertCustomer", tags={"Customers"},
    * @OA\Response (response="200", description="Success"),
    * @OA\Parameter(
    *   in="query",
    *   name="FullName",
    *   required=true,
    *   description="Customer FullName",
    *   @Oa\Schema(
    *     type="string"
    *   )
    * ),
    * @OA\Parameter(
    *   in="query",
    *   name="email",
    *   required=true,
    *   description="Customer Email",
    *   @Oa\Schema(
    *     type="string"
    *   )
    * ),
    * @OA\Parameter(
    *   in="query",
    *   name="phone",
    *   required=true,
    *   description="Customer Phone number",
    *   @Oa\Schema(
    *     type="string"
    *   )
    * ),
    * @OA\Response (response="404", description="Not Found, or Error occured"),
    *)
    */
    public function insertCustomer(string $FullName, string $email, string $phone) {
        $cond = $this->CustomerModel->insertCustomer($FullName, $email, $phone);
        return $this->response($cond);
    }

        /**
    * @OA\Put(path="/restful/customers/updateCustomer", tags={"Customers"},
    * @OA\Response (response="200", description="Success"),
    * @OA\Parameter(
    *   in="query",
    *   name="id",
    *   required=true,
    *   description="Cuatomer ID.",
    *   @Oa\Schema(
    *     type="integer"
    *   )
    * ),
    * @OA\Parameter(
    *   in="query",
    *   name="FullName",
    *   required=true,
    *   description="Customer FullName",
    *   @Oa\Schema(
    *     type="string"
    *   )
    * ),
    * @OA\Parameter(
    *   in="query",
    *   name="email",
    *   required=true,
    *   description="Customer Email",
    *   @Oa\Schema(
    *     type="string"
    *   )
    * ),
    * @OA\Parameter(
    *   in="query",
    *   name="phone",
    *   required=true,
    *   description="Customer Phone number",
    *   @Oa\Schema(
    *     type="string"
    *   )
    * ),
    * @OA\Response (response="404", description="Not Found, or Error occured"),
    *)
    */
    public function updateCustomer(int $id, string $FullName, string $email, string $phone) {
        $cond = $this->CustomerModel->updateCustomer($id, $FullName, $email, $phone);

        return $this->response($cond);
    }

    /**
     * @OA\Delete(path="/restful/customers/deleteCustomer", tags={"Customers"},
     * @OA\Response (response="200", description="Success"),
     * @OA\Parameter(
     *   name="id",
     *   in="query",
     *   required=true,
     *   description="Customer ID.",
     *   @Oa\Schema(
     *     type="integer"
     *   )
     * ),
     * @OA\Response (response="404", description="Not Found, or Error occured"),
     * )
     */
    public function deleteCustomer(int $id) {
        $cond = $this->CustomerModel->deleteCustomer($id);

        return $this->response($cond);
    }
}