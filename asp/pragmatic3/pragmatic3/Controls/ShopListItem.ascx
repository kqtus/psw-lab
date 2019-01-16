<%@ Control Language="C#" AutoEventWireup="true" CodeBehind="ShopListItem.ascx.cs" Inherits="pragmatic3.Controls.ShopListItem" %>

<link rel="stylesheet" href="../Content/Shop.css" />

<div class="container-fluid item">
    <div class="row justify-content-between">
        <div class="col-xs-3">
            <asp:Image CssClass="item-image" ID="productImage" runat="server"/>
        </div>
        <div class="col-xs-7">
            <div>
                <asp:Label CssClass="item-category item-cat1" ID="ProductType" Text="Programming" runat="server" />
                <asp:Label CssClass="item-big-text" ID="ProductName" runat="server" Text="ProdName"/>
            </div>
            <div>
                <asp:Label CssClass="item-italic-text" ID="Author" runat="server"/>

            </div>
            <div><asp:Label ID="ProductDescription" runat="server" Text="ProdDesc"/></div>
        </div>
        <div class="col-xs-2">
            <strong style="text-align: right; float: right;">
                <asp:Label CssClass="item-big-text" ID="ProductPrice" runat="server" Text="ProdPrice"/>
                <asp:Button ID="PreviewBtn" OnClick="PreviewBtn_Click" runat="server" Text="Preview" CssClass="btn btn-success btn-outline" style="width: 110px;"/>
                <asp:Button ID="AddToBasketBtn" OnClick="AddToBasketBtn_Click" runat="server" Text="Add to basket" CssClass="btn btn-primary btn-outline"/>
            </strong>
        </div>
    </div>
</div>
