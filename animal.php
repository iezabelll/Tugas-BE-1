class Animal {
    private $animals;

    public function __construct($data) {
        $this->animals = $data;
    }

    public function index() {
        foreach ($this->animals as $animal) {
            echo $animal . '<br>';
        }
    }

    public function store($data) {
        array_push($this->animals, $data);
    }

    public function update($index, $data) {
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $data;
        } else {
            echo "Index tidak valid.";
        }
    }

    public function destroy($index) {
        if (isset($this->animals[$index])) {
            unset($this->animals[$index]);
            // Reindex the array after removing an element
            $this->animals = array_values($this->animals);
        } else {
            echo "Index tidak valid.";
        }
    }
}

// Membuat objek Animal dan mengisi data awal
$dataHewan = ['kucing', 'anjing', 'ikan'];
$animal = new Animal($dataHewan);

echo 'Index - Menampilkan seluruh hewan <br>';
$animal->index();
echo '<br>';

echo 'Store - Menambahkan hewan baru (burung) <br>';
$animal->store('burung');
$animal->index();
echo '<br>';

echo 'Update - Mengupdate hewan <br>';
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo '<br>';

echo 'Destroy - Menghapus hewan <br>';
$animal->destroy(1);
$animal->index();
echo '<br>';
