<?php
class HinhChuNhat {
    public $chieuDai;
    public $chieuRong;

    public function __construct($chieuDai, $chieuRong) {
        $this->chieuDai = $chieuDai;
        $this->chieuRong = $chieuRong;
    }

    public function tinhDienTich() {
        return $this->chieuDai * $this->chieuRong;
    }

    public function tinhChuVi() {
        return 2 * ($this->chieuDai + $this->chieuRong);
    }
}

$chunhat = new HinhChuNhat(10, 5);
echo "Diện tích: " . $chunhat->tinhDienTich() . "<br>";
echo "Chu vi: " . $chunhat->tinhChuVi();

?>