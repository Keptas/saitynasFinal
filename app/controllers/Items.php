<?php

/**
 * @OA\Info(title="E-shop", version="1.0")
 */
class Items extends Controller {
    public function __construct() {
        parent::__construct();
        $this->ItemModel = $this->model('Item');
    }

    /**
     * @OA\Get(path="/restful/items/getItems", tags={"Items"},
     * @OA\Response (response="200", description="Success"),
     * @OA\Response (response="404", description="Not Found, or Error occured"),
     * )
     */
    public function getItems() {
        $data = $this->ItemModel->getItems();

        return $this->response($data);
    }

    /**
     * @OA\Get(path="/restful/items/getItem", tags={"Items"},
     * @OA\Response (response="200", description="Success"),
     * @OA\Parameter(
     *   name="id",
     *   in="query",
     *   required=true,
     *   description="Id of item.",
     *   @Oa\Schema(
     *     type="integer"
     *   )
     * ),
     * @OA\Response (response="404", description="Not Found, or Error occured"),
     * )
     */
    public function getItem(int $id) {
        $data = $this->ItemModel->getItem($id);
        return $this->response($data);
    }

    /**
     * @OA\Delete(path="/restful/items/deleteItem", tags={"Items"},
     * @OA\Response (response="200", description="Success"),
     * @OA\Parameter(
     *   name="id",
     *   in="query",
     *   required=true,
     *   description="Id of item.",
     *   @Oa\Schema(
     *     type="integer"
     *   )
     * ),
     * @OA\Response (response="404", description="Not Found, or Error occured"),
     * )
     */
    public function deleteItem(int $id) {
        $cond = $this->ItemModel->deleteItem($id);

        return $this->response($cond);
    }

    /**
    * @OA\Post(path="/restful/items/insertItem", tags={"Items"},
    * @OA\Response (response="200", description="Success"),
    * @OA\Parameter(
    *   in="query",
    *   name="name",
    *   required=true,
    *   description="New name of item.",
    *   @Oa\Schema(
    *     type="string"
    *   )
    * ),
    * @OA\Parameter(
    *   in="query",
    *   name="description",
    *   required=true,
    *   description="New description of item.",
    *   @Oa\Schema(
    *     type="string"
    *   )
    * ),
    * @OA\Parameter(
    *   in="query",
    *   name="price",
    *   required=true,
    *   description="New price of item.",
    *   @Oa\Schema(
    *     type="integer"
    *   )
    * ),
    * @OA\Response (response="404", description="Not Found, or Error occured"),
    *)
    */
    public function insertItem(string $name, string $description, float $price) {
        $cond = $this->ItemModel->insertItem($name, $description, $price);

        return $this->response($cond);
    }

    /**
    * @OA\Put(path="/restful/items/updateItem", tags={"Items"},
    * @OA\Response (response="200", description="Success"),
    * @OA\Parameter(
    *   in="query",
    *   name="id",
    *   required=true,
    *   description="Id of item.",
    *   @Oa\Schema(
    *     type="integer"
    *   )
    * ),
    * @OA\Parameter(
    *   in="query",
    *   name="name",
    *   required=true,
    *   description="Updated name of item.",
    *   @Oa\Schema(
    *     type="string"
    *   )
    * ),
    * @OA\Parameter(
    *   in="query",
    *   name="description",
    *   required=true,
    *   description="Updated description of item.",
    *   @Oa\Schema(
    *     type="string"
    *   )
    * ),
    * @OA\Parameter(
    *   in="query",
    *   name="price",
    *   required=true,
    *   description="Updated price of item.",
    *   @Oa\Schema(
    *     type="integer"
    *   )
    * ),
    * @OA\Response (response="404", description="Not Found, or Error occured"),
    *)
    */
    public function updateItem(int $id, string $name, string $description, float $price) {
        $cond = $this->ItemModel->updateItem($id, $name, $description, $price);

        return $this->response($cond);
    }
}