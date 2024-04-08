import React, { Component } from "react";

export default class Menu extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div>
                <i
                    className="bars icon"
                    style={{
                        margin: "0px 22px",
                        top: "16px",
                        left: "32px",
                        position: "absolute",
                        fontSize: "16px",
                        zIndex: 3000,
                    }}
                    onClick={() => {
                        this.props.setOpen(!this.props.open);
                    }}
                >
                    <div
                        className="ui vertical pointing menu"
                        style={
                            this.props.open
                                ? { margin: "8px 0px" }
                                : { display: "none" }
                        }
                    >
                        <a
                            className={
                                this.props.currentPage === "Home"
                                    ? "item active"
                                    : "item"
                            }
                            style={
                                this.props.currentPage === "Home"
                                    ? { cursor: "default" }
                                    : {}
                            }
                            href={
                                this.props.currentPage !== "Home"
                                    ? "/"
                                    : undefined
                            }
                            onClick={(event) => event.stopPropagation()}
                        >
                            Home
                        </a>
                        {this.props.role !== "none" && (
                            <a
                                className={
                                    this.props.currentPage === "MyRecipe"
                                        ? "item active"
                                        : "item"
                                }
                                style={
                                    this.props.currentPage === "MyRecipe"
                                        ? { cursor: "default" }
                                        : {}
                                }
                                href={
                                    // need user id
                                    this.props.currentPage !== "MyRecipe"
                                        ? "/myrecipe"
                                        : undefined
                                }
                                onClick={(event) => event.stopPropagation()}
                            >
                                My Recipes
                            </a>
                        )}
                        {this.props.role !== "none" && (
                            <a
                                className={
                                    this.props.currentPage === "NewRecipe"
                                        ? "item active"
                                        : "item"
                                }
                                style={
                                    this.props.currentPage === "NewRecipe"
                                        ? { cursor: "default" }
                                        : {}
                                }
                                href={
                                    // need user id
                                    this.props.currentPage !== "NewRecipe"
                                        ? "/newrecipe"
                                        : undefined
                                }
                                onClick={(event) => event.stopPropagation()}
                            >
                                Add New Recipe
                            </a>
                        )}
                        {this.props.role === "admin" && (
                            <a
                                className={
                                    this.props.currentPage === "DeleteRecipe"
                                        ? "item active"
                                        : "item"
                                }
                                style={
                                    this.props.currentPage === "DeleteRecipe"
                                        ? { cursor: "default" }
                                        : {}
                                }
                                href={
                                    // need user id
                                    this.props.currentPage !== "DeleteRecipe"
                                        ? "/deleterecipe"
                                        : undefined
                                }
                                onClick={(event) => event.stopPropagation()}
                            >
                                Delete Recipe
                            </a>
                        )}
                    </div>
                </i>
            </div>
        );
    }
}
