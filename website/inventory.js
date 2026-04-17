/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
(function () {
  "use strict";

  function buildUrl(contentName, idKey, idValue) {
    return "index.php?content=" + encodeURIComponent(contentName) + "&" + encodeURIComponent(idKey) + "=" + encodeURIComponent(idValue);
  }

  function submitDelete(contentName, idKey, idValue) {
    var form = document.createElement("form");
    form.method = "post";
    form.action = "index.php";

    var contentInput = document.createElement("input");
    contentInput.type = "hidden";
    contentInput.name = "content";
    contentInput.value = contentName;
    form.appendChild(contentInput);

    var idInput = document.createElement("input");
    idInput.type = "hidden";
    idInput.name = idKey;
    idInput.value = idValue;
    form.appendChild(idInput);

    document.body.appendChild(form);
    form.submit();
  }

  function attachActionButtons(formId, idKey, routes, entityLabel) {
    var form = document.getElementById(formId);
    if (!form) {
      return;
    }

    var select = form.querySelector("select[name='" + idKey + "']");
    var buttons = form.querySelectorAll("button[data-action]");

    function getSelectedId() {
      if (!select || !select.value) {
        alert("Please select a " + entityLabel + " first.");
        return null;
      }
      return select.value;
    }

    buttons.forEach(function (button) {
      button.addEventListener("click", function () {
        var selectedId = getSelectedId();
        if (!selectedId) {
          return;
        }

        var action = button.getAttribute("data-action");
        if (action === "view") {
          window.location.href = buildUrl(routes.view, idKey, selectedId);
          return;
        }

        if (action === "update") {
          window.location.href = buildUrl(routes.update, idKey, selectedId);
          return;
        }

        if (action === "delete") {
          var confirmed = window.confirm("Delete the selected " + entityLabel + " record?");
          if (confirmed) {
            submitDelete(routes.delete, idKey, selectedId);
          }
        }
      });
    });
  }

  function updateSummaryValues(response) {
    var typeCount = document.getElementById("type_count_value");
    var itemCount = document.getElementById("item_count_value");
    var buyTotal = document.getElementById("buy_price_total_value");
    var sellTotal = document.getElementById("sell_price_total_value");
    var status = document.getElementById("inventory_summary_status");

    if (!typeCount || !itemCount || !buyTotal || !sellTotal || !status) {
      return;
    }

    typeCount.textContent = response.typeCount;
    itemCount.textContent = response.itemCount;
    buyTotal.textContent = "$" + response.buyPriceTotal;
    sellTotal.textContent = "$" + response.sellPriceTotal;
    status.textContent = "Last AJAX update: " + response.updatedAt;
  }

  function loadInventorySummary() {
    var panel = document.getElementById("inventory_summary_panel");
    var status = document.getElementById("inventory_summary_status");

    if (!panel || !status) {
      return;
    }

    var endpoint = panel.getAttribute("data-endpoint");
    var request = new XMLHttpRequest();
    request.open("GET", endpoint + "?cacheBust=" + Date.now(), true);

    request.onreadystatechange = function () {
      if (request.readyState !== 4) {
        return;
      }

      if (request.status === 200) {
        try {
          var response = JSON.parse(request.responseText);
          if (response.success) {
            updateSummaryValues(response);
            return;
          }
          status.textContent = response.message || "Unable to load inventory totals.";
        } catch (error) {
          status.textContent = "Unable to read the AJAX response.";
        }
        return;
      }

      status.textContent = "Problem loading inventory totals right now.";
    };

    status.textContent = "Loading current inventory totals...";
    request.send();
  }

  attachActionButtons("clock_type_action_form", "clockTypeID", {
    view: "viewclocktype",
    update: "updateclocktype",
    delete: "removeclocktype"
  }, "clock type");

  attachActionButtons("clock_action_form", "clockID", {
    view: "viewclock",
    update: "updateclock",
    delete: "removeclock"
  }, "clock item");

  var refreshButton = document.getElementById("refresh_inventory_button");
  if (refreshButton) {
    refreshButton.addEventListener("click", loadInventorySummary);
  }

  loadInventorySummary();
  window.setInterval(loadInventorySummary, 15000);
})();
