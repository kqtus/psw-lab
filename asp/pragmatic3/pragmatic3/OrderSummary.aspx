<%@ Page Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="OrderSummary.aspx.cs" Inherits="pragmatic3.OrderSummary" %>

<asp:Content ID="BodyContent" ContentPlaceHolderID="MainContent" runat="server">
    <div class="container" style="width: 70%;">
        <div><h1>Order summary</h1></div>
        <div style="margin-top: 40px;">
            <h4 style="margin-bottom: 40px;">1. Items in basket</h4>

            <div style="text-align: center;" >
                <asp:Label ID="NoItemsLabel" Visible="false" runat="server" Text="No items."/>
            </div>
            
            <asp:ListView runat="server" ID="ItemsPanel" SelectMethod="GetItemModels">
                <ItemTemplate>
                    <div class="container" style="margin-top: 10px; margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-3">
                                <%# Eval("Title") %>
                            </div>
                            <div class="col-md-4">
                                <%# Eval("Description") %>
                            </div>
                            <div class="col-md-1">
                                <p style="float: right; font-style: italic;"><%# Eval("Price") %> $</p>
                            </div>
                        </div>
                    </div>
                </ItemTemplate>
            </asp:ListView>

            <h4 style="text-align: right; margin-right: 20px;">
                Price: <%=_shopManager.GetBasketPrice() %> $
            </h4>
            <hr />
        </div>
        <div>
            <h4>2. Order details</h4>
            <div style="margin-top: 20px;">
                <p>Delivery type:</p>
                <asp:DropDownList ID="DeliveryTypeDDL" OnSelectedIndexChanged="DeliveryTypeDDL_SelectedIndexChanged" AutoPostBack="true" runat="server" CssClass="form-control" />
            </div>

            <div style="margin-top: 20px;">
                <p>Payment method:</p>
                <asp:DropDownList runat="server" CssClass="form-control" >
                    <asp:ListItem Text="Bank transfer" />
                    <asp:ListItem Text="MasterCard" />
                    <asp:ListItem Text="PayPal" />
                    <asp:ListItem Text="BLIK" />
                </asp:DropDownList>
            </div>

            <h4 style="text-align: right; margin-right: 20px;">
                Total price: <%=(_shopManager.GetBasketPrice()+(decimal)AdditionalPrice) %> $
            </h4>

            <div style="text-align: right; margin-right: 20px;">
                <asp:Button ID="BackBtn" runat="server" CssClass="btn btn-danger" PostBackUrl="~/Shop.aspx" Text="Back"/>
                <asp:Button ID="OrderBtn" OnClick="OrderBtn_Click" runat="server" CssClass="btn btn-success" Text="Buy" />
            </div>

            <hr />
        </div>
    </div>
</asp:Content>