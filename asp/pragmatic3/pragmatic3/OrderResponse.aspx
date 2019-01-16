<%@ Page Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="OrderResponse.aspx.cs" Inherits="pragmatic3.OrderResponse" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <div class="container" style="text-align: center; margin-top: 150px; margin-bottom: 150px;">
        <h2>Thank you!</h2>
        <p>Your order is on the way. Please check your email account for any updates.</p>

        <asp:Button ID="ContinueBtn" runat="server" PostBackUrl="~/Shop.aspx" Text="Continue" CssClass="btn btn-success" />
    </div>
</asp:Content>