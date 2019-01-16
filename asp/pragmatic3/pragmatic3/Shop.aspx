<%@ Page Title="Shop" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Shop.aspx.cs" Inherits="pragmatic3.Shop" %>

<%@ Reference Control="~/Controls/ShopListItem.ascx" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-3">
                <div style="margin-bottom: 30px;">
                    <h4>Basket</h4>
                    <p>
                        Items: <asp:Label ID="BasketItemsCountLabel" runat="server" /> 
                    </p>
                    <p>
                        Price: <asp:Label ID="BasketPriceLabel" runat="server" />$.
                    </p>
                    <asp:Button ID="EmptyBtn" OnClick="EmptyBtn_Click" runat="server" CssClass="btn btn-danger btn-outline" Text="Empty" />
                    <asp:Button ID="CheckoutBtn" OnClick="CheckoutBtn_Click" runat="server" CssClass="btn btn-success btn-outline" Text="Check out" PostBackUrl="~/OrderSummary.aspx" />
                    <hr />
                </div>

                <div>
                    <h4>Categories</h4>
                    <asp:RadioButtonList ID="RadioList" OnSelectedIndexChanged="RadioList_SelectedIndexChanged" AutoPostBack="true"  runat="server" style="margin-left: 20px;">
                        <asp:ListItem class="radio" Selected="True" Text="All"></asp:ListItem>
                        <asp:ListItem class="radio" Text="Databases"></asp:ListItem>
                        <asp:ListItem class="radio" Text="Web Development"></asp:ListItem>
                        <asp:ListItem class="radio" Text="Mobile Develompent"></asp:ListItem>
                        <asp:ListItem class="radio" Text="Games Develompent"></asp:ListItem>
                        <asp:ListItem class="radio" Text="Data Science"></asp:ListItem>
                        <asp:ListItem class="radio" Text="Cyber security"></asp:ListItem>
                    </asp:RadioButtonList>

                    <hr />
                </div>

            </div>
            <div class="col-md-7">
                <asp:Panel runat="server" ID="ItemsPanel"></asp:Panel>
            </div>
        </div>
    </div>
</asp:Content>
