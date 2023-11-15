async function Notif() {
    const response = await fetch("desa/data_pesan.php");
    const res = await response.json();
    const jumlah = res.result.length;
    const data = res.result;
    document.getElementById("notifsertifikat").innerHTML = jumlah;
    document.querySelector("#pesan").innerHTML = ""
    for (val of data) {
        const ul = document.querySelector("#pesan")
        const li = document.createElement("li")
        li.innerHTML = `<p>${val.status_pengajuan},${val.no_reg}</p>` 
        ul.append(li)
    }

     
    console.log(res.result);
}

setInterval(Notif, 5000);

async function notifahliWaris() {
  const response = await fetch("desa/data_pesan_ahliwaris.php");
  const res = await response.json();
  const jumlah = res.result.length;
  const data = res.result;
  document.getElementById("notifahliwaris").innerHTML = jumlah;
  document.querySelector("#pesan").innerHTML = ""
  for (val of data) {
      const ul = document.querySelector("#pesan")
      const li = document.createElement("li")
      li.innerHTML = `<p>${val.status_pengajuan},${val.no_reg}</p>` 
      ul.append(li)
  }

   
  console.log(res.result);
}

setInterval(notifahliWaris, 5000);


async function notifMutasi() {
  const response = await fetch("desa/data_pesan_mutasi.php");
  const res = await response.json();
  const jumlah = res.result.length;
  const data = res.result;
  document.getElementById("notifmutasi").innerHTML = jumlah;
  document.querySelector("#pesan").innerHTML = ""
  for (val of data) {
      const ul = document.querySelector("#pesan")
      const li = document.createElement("li")
      li.innerHTML = `<p>${val.status_pengajuan},${val.no_reg}</p>` 
      ul.append(li)
  }

   
  console.log(res.result);
}
setInterval(notifMutasi, 5000);


