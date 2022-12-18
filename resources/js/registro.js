const myURL = "../controllers/registro.php";

function resetForm() {
  $("#form-practicas")[0].reset();
  $("#Select").show("slow");
  $("#datos").hide(100);
}

function selectUser(id, name) {
  $("#user").val(id);
  $("#name-user").val(name);
  $("#lienzo").empty();
  $("#serchI").focus();
  $("#serchU").val("");
}

function selectInst(clave, name) {
  $("#inst").val(clave);
  $("#name-escuela").val(name);
  $("#lienzoI").empty();
  if ($("#name-user").val() != "") {
    $("#serchI").val("");
    $("#Select").hide(100);
    $("#datos").show("slow");
    getService(clave);
  }
}

function getService(clave) {
  $.ajax({
    url: myURL,
    type: "POST",
    data: { action: "getServices", clave },
    success: function (response) {
      console.log(response);
      if (response.length > 1) {
        data = JSON.parse(response);
        $("#escuela").empty();
        $("#escuela").append(
          "<option value='' selected disabled>Selecciona una Carrera/Oficio </option>"
        );
        $.each(data, function (key, item) {
          $("#escuela").append(
            "<option value='" + item.id + "'>" + item.servicio + " </option>"
          );
        });
      } else {
        $("#escuela").empty();
        $("#escuela").append(
          "<option value='' selected disabled>Selecciona una Carrera/Oficio </option>"
        );
      }
    },
  });
}

function sendInfo() {
  $.ajax({
    url: myURL,
    type: "POST",
    data: $("#form-practicas").serialize(),
    success: function (response) {
      console.log(response);
      if(response.trim() == 1){
        swal("Registro éxitoso!","ANDIC A.C." ,"success").then((value=>{
            location.reload();
        }));
      }
      else if(response.trim() == 0){
        swal("Cuidado la matricula ya se encuentra registrada","No puede comenzar otro proceso del mismo tipo","info");
      }
    },
  });

  return false;
}

$(function () {
  console.log("jQuery Work");
  $("#datos").hide();

  $("#serchU").keyup(function () {
    user = $("#serchU").val();
    //console.log(user);
    if (user != "") {
      $.ajax({
        url: myURL,
        type: "POST",
        data: { action: "getUser", user },
        success: function (response) {
          if (response.length > 1) {
            data = JSON.parse(response);
            //console.log(data);
            $("#lienzo").empty();

            $.each(data, function (key, item) {
              $("#lienzo").append(
                "<tr class='text-center'>" +
                  "<td>" +
                  item.name +
                  "</td>" +
                  "<td>" +
                  item.app +
                  "</td>" +
                  "<td>" +
                  item.apm +
                  "</td>" +
                  "<td>" +
                  "<button class='btn btn-success btn-small' onclick='selectUser(`" +
                  item.ID +
                  "`,`" +
                  item.name +
                  "`)'>" +
                  "<i class='fa fa-check-circle' aria-hidden='true'></i>" +
                  "</button>" +
                  "</td>" +
                  "</tr>"
              );
            });
          } else {
            $("#lienzo").empty();
            $("#lienzo").append(
              "<tr class='text-center'>" +
                "<td colspan='4'>No existen coincidencias</td>" +
                "</tr>"
            );
          }
        },
      });
    } else {
      $("#lienzo").empty();
      $("#lienzo").append(
        "<tr class='text-center'>" +
          "<td colspan='4'>No existen coincidencias</td>" +
          "</tr>"
      );
    }
  });

  $("#serchI").keyup(function () {
    clave = $("#serchI").val();
    //console.log(clave);
    if (clave != "") {
      $.ajax({
        url: myURL,
        type: "POST",
        data: { action: "getInst", clave },
        success: function (response) {
          if (response.length > 1) {
            data = JSON.parse(response);
            //console.log(data);
            $("#lienzoI").empty();

            $.each(data, function (key, item) {
              $("#lienzoI").append(
                "<tr class='text-center'>" +
                  "<td>" +
                  item.clave +
                  "</td>" +
                  "<td>" +
                  item.name +
                  "</td>" +
                  "<td>" +
                  item.dir +
                  "</td>" +
                  "<td>" +
                  "<button class='btn btn-success btn-small' onclick='selectInst(`" +
                  item.clave +
                  "`,`" +
                  item.name +
                  "`)'>" +
                  "<i class='fa fa-check-circle' aria-hidden='true'></i>" +
                  "</button>" +
                  "</td>" +
                  "</tr>"
              );
            });
          } else {
            $("#lienzoI").empty();
            $("#lienzoI").append(
              "<tr class='text-center'>" +
                "<td colspan='4'>No existen coincidencias</td>" +
                "</tr>"
            );
          }
        },
      });
    } else {
      $("#lienzoI").empty();
      $("#lienzoI").append(
        "<tr class='text-center'>" +
          "<td colspan='4'>No existen coincidencias</td>" +
          "</tr>"
      );
    }
  });
});
