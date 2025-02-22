$(document).ready(function () {

    addNewRow();

    $("#add").click(function () {
        addNewRow();
    });

    function addNewRow() {
        $.ajax({
            url: "includes/process.php",
            method: "POST",
            data: { getNewOrderItem: 1 },
            success: function (data) {
                $("#invoice_item").append(data);
                var n = 0;
                $(".number").each(function () {
                    $(this).html(++n);
                });
            }
        });
    }

    $("#remove").click(function () {
        $("#invoice_item").children("tr:last").remove();
        calculate(0, 0);
    });

    $("#invoice_item").delegate(".pid", "change", function () {
        var pid = $(this).val();
        var tr = $(this).closest("tr");
        $(".overlay").show();
        $.ajax({
            url: "includes/process.php",
            method: "POST",
            dataType: "json",
            data: { getPriceAndQty: 1, id: pid },
            success: function (data) {
                tr.find(".tqty").val(data["product_stock"]);
                tr.find(".pro_name").val(data["product_name"]);
                tr.find(".qty").val(1);
                tr.find(".price").val(data["product_price"]);
                tr.find(".amt").html(tr.find(".qty").val() * tr.find(".price").val());
                calculate(0, 0);
            }
        });
    });

    $("#invoice_item").delegate(".qty", "keyup", function () {
        var qty = $(this);
        var tr = $(this).closest("tr");

        if (isNaN(qty.val())) {
            alert("Please enter a valid quantity");
            qty.val(1);
        } else {
            if ((qty.val() - 0) > (tr.find(".tqty").val()) - 0) {
                alert("Stock overflow");
                qty.val(1);
            } else {
                tr.find(".amt").html(qty.val() * tr.find(".price").val());
                calculate(0, 0);
            }
        }
    });

    function calculate(dis, paid) {
        var sub_total = 0;
        var profit = 0;
        var net_total = 0;
        var discount = dis;
        var paid_amt = paid;
        var due = 0;

        $(".amt").each(function () {
            sub_total += ($(this).html() * 1);
        });

        profit = (sub_total * discount) / 100;
        net_total = sub_total + profit;
        due = net_total - paid_amt;

        $("#sub_total").val(sub_total);
        $("#t_profit").val(profit);
        $("#net_total").val(net_total);
        $("#due").val(due);
    }

    $("#discount").keyup(function () {
        var discount = $(this).val();
        calculate(discount, 0);
    });

    $("#paid").keyup(function () {
        var paid = $(this).val();
        var discount = $("#discount").val();
        calculate(discount, paid);
    });

    // Order taking
    $("#order_form").click(function () {
        var invoice = $("#get_order_data").serialize();

        if ($("#cust_name").val() === "") {
            alert("Please enter customer name");
        } else if ($("#paid").val() === "") {
            alert("Please enter the amount to pay");
        } else {
            $.ajax({
                url: "includes/process.php",
                method: "POST",
                data: $("#get_order_data").serialize(),
                success: function (data) {
                    $("#get_order_data").trigger("reset");

                    if (data == "Order failed due to Insufficient stock") {
                        alert("Order failed due to insufficient stock");
                        window.location.href = "../new_order.php";
                    } else {
                        if (confirm("Print Invoice?")) {
                            window.location.href = "includes/invoice_bill.php?invoice_no=" + data + "&" + invoice;
                        }
                    }
                }
            });
        }
    });

});
