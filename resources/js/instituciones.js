const url = "../controllers/institud.php";

function vistas(viewFlag) {
  $("#register").removeClass("active");
  $("#tableU").removeClass("active");
  if (viewFlag == "N") {
    $("#cct").prop("readonly", false);
    $("#Action").val("newInst");
    $("#form-institucion")[0].reset();
    $("#table-s").hide(10);
    $("#table-inst").hide(10);
    $("#newInst").show("slow");
    $("#register").addClass("active");
    $("#tableI").removeClass("active");
    $("#btn-form").removeClass("btn-primary");
    $("#btn-form").addClass("btn-success");
    $("#btn-form").html(
      "<i class='fa fa-save' aria-hidden='true'></i>" + "Guardar Datos"
    );
  } else if (viewFlag == "T") {
    $("#newInst").hide(10);
    $("#table-s").hide(10);
    $("#table-inst").show("slow");
    $("#tableI").addClass("active");
    $("#register").removeClass("active");
  } else if (viewFlag == "S") {
    $("#newInst").hide(10);
    $("#table-inst").hide(10);
    $("#table-s").show("slow");
  }
}

function sendInfo() {
  $.ajax({
    url: url,
    type: "POST",
    data: $("#form-institucion").serialize(),
    success: function (response) {
      console.log(response);
      if (response.trim() == 1) {
        swal("Registro exitoso!!!", "ANDIC A.C.", "success").then((values) => {
          location.href = "institucion.php?view=T";
        });
      } else if (response.trim() == -1) {
        swal("Oops!", "La informacion ingresada esta duplicada", "info");
      } else {
        swal(
          "Error!",
          "Lo sentimos ocurrio un error inesperado, intenta de nuevo...",
          "error"
        );
      }
    },
  });
  return false;
}

function getInstitud(clave) {
  $.ajax({
    url: url,
    type: "POST",
    data: { action: "getInst", clave },
    success: function (response) {
      console.log(response);
      vistas("N");
      data = JSON.parse(response);
      $("#action").val("updateInst");
      $("#cct").prop("readonly", true);
      $("#cct").val(data.clave);
      $("#name").val(data.nombre_ins);
      $("#lider").val(data.repre);
      $("#representante").val(data.sub);
      $("#phone").val(data.phone);
      $("#tipoIns").val(data.tipo_ins);
      $("#direccion").val(data.direc);
      $("#btn-form").removeClass("btn-success");
      $("#btn-form").addClass("btn-primary");
      $("#btn-form").html(
        "<i class='fa fa-sync' aria-hidden='true'></i> Actializar Datos"
      );
    },
  });
}

function deleteInst(clave) {
  swal({
    title: "Estas Segur@?",
    text: "Una vez eliminado el registro, no podra recuperarlo!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: url,
        type: "POST",
        data: { action: "deleteInst", clave },
        success: function (response) {
          console.log(response);
          if (response.trim() == 1) {
            swal("Eliminacion exitosa!", "ANDIC A.C. 2022", "success").then(
              (value) => {
                location.href = "institucion.php?view=T";
              }
            );
          }
        },
      });
    }
  });
}

/*****************************************************
 * SERVICIOS
 ********************************************/

function newServices() {
  cct = $("#institud").val();
  $.ajax({
    url: url,
    type: "POST",
    data: $("#form-servicio").serialize(),
    success: function (response) {
      console.log(response);
      if (response.trim() == 1) {
        swal("Servicio Agregado", "ANDIC A.C. 2022", "success").then(
          (value) => {
            getServices(cct);
            $("#service").val("");
            $("#service").focus();
          }
        );
      } else {
        swal("Oop ocurrio un error", "Intenta de nuevo mas tade...", "error");
      }
    },
  });

  return false;
}

function getServices(clave) {
  vistas("S");
  $("#institud").val(clave);
  $("#lienzo-services").empty();
  $.ajax({
    url: url,
    type: "POST",
    data: { action: "getServices", clave },
    success: function (response) {
      //console.log(response);
      if (response.trim() != 0) {
        data = JSON.parse(response);
        $.each(data, function (key, item) {
          $("#lienzo-services").append(
            "<tr class='text-center'>" +
              "<td width=80%>" +
              item.name +
              "</td>" +
              "<td width=20%>" +
              "<button class='btn btn-danger btn-small' onclick='deleteService(" +
              item.id +
              ")'>" +
              "<i class='fa fa-trash' aria-hidden='true'></i>" +
              "</button>" +
              "</td>" +
              "</tr>"
          );
        });
      }
    },
  });
}

function deleteService(service) {
  swal({
    title: "Estas Segur@?",
    text: "Una vez eliminado el registro, no podra recuperarlo!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: url,
        type: "POST",
        data: { action: "deleteService", service },
        success: function (response) {
          console.log(response);
          if (response.trim() == 1) {
            swal("Eliminacion exitosa!", "ANDIC A.C. 2022", "success").then(
              (value) => {
                getServices($("#institud").val());
              }
            );
          }
        },
      });
    }
  });
}

$(function () {
  vistas(viewFlag);
  $("#table-instituciones").dataTable();

  $("#btn-close-s").click(function () {
    vistas("T");
  });
});
