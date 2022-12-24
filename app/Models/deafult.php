public function ProbK1()
{
$db = db_connect();
$builder = $db->table('tmp_final');
$builder->select('*');
$builder->where('id_kerusakan', 1);
$prob = $builder->get()->getResult();
//inisialisasi untuk total probabilitas
$jumlah = 0;
foreach ($prob as $pr) {
$jumlah = $jumlah + $pr->probabilitas;
}
// Perhitungan hasil bayes kerusakan 1
// (Prob kerusakan di tmp_final * prob di tabel kerusakan)'
$query = $db->table('tbl_kerusakan');
$query->select('*');
$query->where('id_kerusakan', 1);
$data = $query->get()->getResult();
foreach ($data as $rowku) {
$hasilBayes = $jumlah * $rowku->probabilitas;
}
return $hasilBayes;
}