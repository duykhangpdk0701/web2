const fetchData = () => {
  const xmlhttp = new XMLHttpRequest();
  const method = "GET";
  const url = "./includes/listProduct.inc.php";
  xmlhttp.open(method, url, true);

  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      console.log(xmlhttp.responseText);
    } else {
      console.warn("data response failed");
    }
  };

  xmlhttp.send();
};

const app = () => {
  fetchData();
};

app();
