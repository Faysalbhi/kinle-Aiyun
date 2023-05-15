
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice</title>

    <style>
      @font-face {
        font-family: "Inter";
        src: url("Inter-Regular.ttf") format("truetype");
        font-weight: 400;
        font-style: normal;
      }

      @font-face {
        font-family: "Inter";
        src: url("Inter-Medium.ttf") format("truetype");
        font-weight: 500;
        font-style: normal;
      }

      @font-face {
        font-family: "Inter";
        src: url("Inter-Bold.ttf") format("truetype");
        font-weight: 700;
        font-style: normal;
      }

      @font-face {
        font-family: "Space Mono";
        src: url("SpaceMono-Regular.ttf") format("truetype");
        font-weight: 400;
        font-style: normal;
      }

      body {
        font-size: 0.75rem;
        font-family: "Inter", sans-serif;
        font-weight: 400;
        color: #000000;
        margin: 0 auto;
        position: relative;
      }

      #pspdfkit-header {
        font-size: 0.625rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 400;
        color: #717885;
        margin-top: 2.5rem;
        margin-bottom: 2.5rem;
        width: 100%;
      }

      .header-columns {
        display: flex;
        justify-content: space-between;
        padding-left: 2.5rem;
        padding-right: 2.5rem;
      }

      .logo {
        height: 1.5rem;
        width: auto;
        margin-right: 1rem;
      }

      .logotype {
        display: flex;
        align-items: center;
        font-weight: 700;
      }

      h2 {
        font-family: "Space Mono", monospace;
        font-size: 1.25rem;
        font-weight: 400;
      }

      h4 {
        font-family: "Space Mono", monospace;
        font-size: 1rem;
        font-weight: 400;
      }

      .page {
        margin-left: 5rem;
        margin-right: 5rem;
      }

      .intro-table {
        display: flex;
        justify-content: space-between;
        margin: 3rem 0 3rem 0;
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
      }

      .intro-form {
        display: flex;
        flex-direction: column;
        border-right: 1px solid #000000;
        width: 50%;
      }

      .intro-form:last-child {
        border-right: none;
      }

      .intro-table-title {
        font-size: 0.625rem;
        margin: 0;
      }

      .intro-form-item {
        padding: 1.25rem 1.5rem 1.25rem 1.5rem;
      }

      .intro-form-item:first-child {
        padding-left: 0;
      }

      .intro-form-item:last-child {
        padding-right: 0;
      }

      .intro-form-item-border {
        padding: 1.25rem 0 0.75rem 1.5rem;
        border-bottom: 1px solid #000000;
      }

      .intro-form-item-border:last-child {
        border-bottom: none;
      }

      .form {
        display: flex;
        flex-direction: column;
        margin-top: 6rem;
      }

      .no-border {
        border: none;
      }

      .border {
        border: 1px solid #000000;
      }

      .border-bottom {
        border: 1px solid #000000;
        border-top: none;
        border-left: none;
        border-right: none;
      }

      .signer {
        display: flex;
        justify-content: space-between;
        gap: 2.5rem;
        margin: 2rem 0 2rem 0;
      }

      .signer-item {
        flex-grow: 1;
      }

      input {
        color: #4537de;
        font-family: "Space Mono", monospace;
        text-align: center;
        margin-top: 1.5rem;
        height: 4rem;
        width: 100%;
        box-sizing: border-box;
      }

      input#date,
      input#notes {
        text-align: left;
      }

      input#signature {
        height: 8rem;
      }

      .intro-text {
        width: 60%;
      }

      .table-box table,
      .summary-box table {
        width: 100%;
        font-size: 0.625rem;
      }

      .table-box table {
        padding-top: 2rem;
      }

      .table-box td:first-child,
      .summary-box td:first-child {
        width: 50%;
      }

      .table-box td:last-child,
      .summary-box td:last-child {
        text-align: right;
      }

      .table-box table tr.heading td {
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
        height: 1.5rem;
      }

      .table-box table tr.item td,
      .summary-box table tr.item td {
        border-bottom: 1px solid #d7dce4;
        height: 1.5rem;
      }

      .summary-box table tr.no-border-item td {
        border-bottom: none;
        height: 1.5rem;
      }

      .summary-box table tr.total td {
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
        height: 1.5rem;
      }

      .summary-box table tr.item td:first-child,
      .summary-box table tr.total td:first-child {
        border: none;
        height: 1.5rem;
      }

      #pspdfkit-footer {
        font-size: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 500;
        color: #717885;
        margin-top: 2.5rem;
        bottom: 2.5rem;
        position: absolute;
        width: 100%;
      }

      .footer-columns {
        display: flex;
        justify-content: space-between;
        padding-left: 2.5rem;
        padding-right: 2.5rem;
      }
    </style>
  </head>

  <body>
    <div id="pspdfkit-header">
      <div class="header-columns">
        <div class="logotype">
          <img class="logo" src="logo.svg" />
          <p>Company</p>
        </div>

        <div>
          <p>[Company Info]</p>
        </div>
      </div>
    </div>

    <div class="page" style="page-break-after: always">
      <div>
        <h2>Invoice #</h2>
      </div>

      <div class="intro-table">
        <div class="intro-form intro-form-item">
          <p class="intro-table-title">Billed To:</p>
          <p>
            Company Ltd.<br />
            Address<br />
            Country<br />
            VAT ID: ATU12345678
          </p>
        </div>

        <div class="intro-form">
          <div class="intro-form-item-border">
            <p class="intro-table-title">Payment Date:</p>
            <p>November 22nd 2021</p>
          </div>

          <div class="intro-form-item-border">
            <p class="intro-table-title">Payment Method:</p>
            <p>Bank Transfer</p>
          </div>
        </div>
      </div>

      <div class="table-box">
        <table cellpadding="0" cellspacing="0">
          <tbody>
            <tr class="heading">
              <td>Description</td>
              <td>QTY</td>
              <td>Unit Price</td>
              <td>Total</td>
            </tr>

            <tr class="item">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

            <tr class="item">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

            <tr class="item">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

            <tr class="item">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

            <tr class="item">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

            <tr class="item">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="summary-box">
        <table cellpadding="0" cellspacing="0">
          <tbody>
            <tr class="item">
              <td></td>
              <td>Subtotal:</td>
              <td></td>
            </tr>

            <tr class="item">
              <td></td>
              <td>Discount:</td>
              <td></td>
            </tr>

            <tr class="item">
              <td></td>
              <td>Subtotal Less Discount:</td>
              <td></td>
            </tr>

            <tr class="item">
              <td></td>
              <td>Tax Rate:</td>
              <td></td>
            </tr>

            <tr class="item">
              <td></td>
              <td>Total Tax:</td>
              <td></td>
            </tr>

            <tr class="item">
              <td></td>
              <td>Shipping/Handling:</td>
              <td></td>
            </tr>

            <tr class="no-border-item">
              <td></td>
              <td>Total Due:</td>
              <td></td>
            </tr>

            <tr class="total">
              <td></td>
              <td>Amount Paid:</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="page" style="page-break-after: always">
      <div>
        <h4>Thank you for your purchase!</h4>
      </div>

      <div class="form">
        <label for="notes" class="label"> Notes: </label>
        <input type="text" id="notes" class="border-bottom" value="" />
      </div>

      <div class="signer">
        <div class="form signer-item">
          <label for="date" class="label">Date:</label>
          <input type="text" id="date" class="border-bottom" value="01/01/2021" />
        </div>

        <div class="form signer-item">
          <label for="signature" class="label">Issued by:</label>
          <input type="text" id="signature" class="border" value="Sign Here" />
        </div>
      </div>
    </div>

    <div id="pspdfkit-footer">
      <div class="footer-columns">
        <span>Invoice</span>
        <span></span>
      </div>
    </div>
  </body>
</html>
{{ $data }}