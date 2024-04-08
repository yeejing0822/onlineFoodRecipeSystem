import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import Menu from "./Menu";
import { Rating } from "semantic-ui-react";
import "semantic-ui-css/semantic.min.css";
import { Button, Container, FormControl, ListItem, Modal, ModalOverlay, ModalContent, ModalFooter, ModalBody, Textarea, UnorderedList, ChakraProvider} from '@chakra-ui/react';
import { DeleteIcon, EditIcon } from "@chakra-ui/icons";

export default class Recipe extends Component {
    constructor(props) {
        super(props);
        this.state = {
            recipe: {
                ratings: [],
                comments: [],
                ingredients: "",
                steps: "",
                user: {},
            },
            menu: false,
            comment: "",
            messageBox: {
                message: "",
                open: false,
                closeRefresh: false,
            },
            rated: false,
        };
    }

    loadRecipe() {
        axios.get(`/api/recipe/${this.props.recipe_id}`).then((response) => {
            const ratings = response.data.ratings;
            const rated = ratings.find(
                (rating) => rating.user_id == this.props.user_id
            )
                ? true
                : false;
            this.setState({
                recipe: response.data,
                rated,
            });
        });
    }

    addComment() {
        axios
            .post("/api/addComment", {
                user_id: this.props.user_id,
                recipe_id: this.props.recipe_id,
                comment: this.state.comment,
            })
            .then((response) => {
                this.setState({
                    comment: "",
                    messageBox: {
                        message: "Comment is added.",
                        open: true,
                        closeRefresh: true,
                    },
                });
            });
    }

    addRating(rating) {
        if (this.state.rated) {
            this.setState({
                messageBox: {
                    message: "Your have already rated.",
                    open: true,
                    closeRefresh: false,
                },
            });
        } else {
            axios
                .post("/api/addRating", {
                    user_id: this.props.user_id,
                    recipe_id: this.props.recipe_id,
                    rating: rating,
                })
                .then((response) => {
                    this.setState({
                        messageBox: {
                            message: "Your rate is accepted.",
                            open: true,
                            closeRefresh: true,
                        },
                    });
                });
        }
    }

    deleteComment(commentId) {
        axios.delete(`/api/deleteComment/${commentId}`).then((response) => {
            this.setState({
                messageBox: {
                    message: "The comment is deleted.",
                    open: true,
                    closeRefresh: true,
                },
            });
        });
    }

    recipeDetail(recipe) {
        const avg =
            recipe.ratings
                .map((rating) => rating.rating)
                .reduce((a, b) => a + b, 0) / recipe.ratings.length;
        const ingredients = recipe.ingredients.split("|");
        const steps = recipe.steps.split("|");
        return (
            <Container style={{ size:"100px", maxWidth:"150ch" }}>
                <h1 style={{textAlign:"center", fontSize: "40px", color:"white", backgroundColor:"black", margin:"20px", padding:"10px"}}>{recipe.name}</h1>
                <div
                    style={{
                        display: "flex",
                        flexDirection: "row",
                        fontSize: "16px",
                    }}
                >
                    <Rating
                        icon="star"
                        maxRating={5}
                        rating={avg}
                        style={{ fontSize: "24px" }}
                        onRate={(_event, data) => {
                            if (this.props.user_id) this.addRating(data.rating);
                            else {
                                this.setState({
                                    messageBox: {
                                        message: "Please login to rate.",
                                        open: true,
                                        closeRefresh: false,
                                    },
                                });
                            }
                        }}
                    />
                    <div
                        style={{
                            margin: "0px 10px",
                            padding: "4px 10px",
                        }}
                    >
                        {recipe.ratings.length} Ratings
                    </div>
                    <div
                        style={{
                            borderLeft: "1px solid grey",
                            margin: "0px 10px",
                            padding: "4px 10px",
                        }}
                    >
                        {recipe.comments.length} Comments
                    </div>
                    <div
                        style={{
                            borderLeft: "1px solid grey",
                            margin: "0px 10px",
                            padding: "4px 10px",
                        }}
                    >
                        By {recipe.user.name}
                    </div>
                </div>
                <div style={{ paddingTop: "20px", fontSize: "20px" }}>
                    {recipe.description}
                </div>
                <div
                    style={{
                        display: "grid",
                        gridTemplateColumns: "596px auto",
                        columnGap: "20px",
                        rowGap: "8px",
                        padding: "20px 0px",
                    }}
                >
                    <img src={recipe.image} height="596px" width="596px" />
                    <div>
                        <h2 style={{ fontSize: "32px" }}>Ingredients</h2>
                        <UnorderedList>
                            {
                               ingredients.map(ingredient => (
                                    <ListItem>{ingredient}</ListItem>
                                ))
                            }
                        </UnorderedList>
                    </div>
                    <div>
                        <h2 style={{ fontSize: "32px" }}>How to Cook?</h2>
                        {steps.map((step, index) => {
                            return (
                                <div key={index}>
                                    <h3 style={{ fontSize: "24px" }}>
                                        Step {index + 1}
                                    </h3>
                                    <div
                                        style={{
                                            paddingBottom: "16px",
                                            fontSize: "20px",
                                        }}
                                    >
                                        {step}
                                    </div>
                                </div>
                            );
                        })}
                    </div>
                    <div>
                        <h2
                            style={{
                                fontSize: "32px",
                                alignItems: "center",
                                display: "flex",
                                justifyContent: "space-between",
                            }}
                        >
                            Comments {"(" + recipe.comments.length + ")"}{" "}
                        </h2>
                        {recipe.comments.map((ea, index) => {
                            return (
                                <div
                                    key={index}
                                    style={{
                                        marginBottom: "4px",
                                        border: "solid 1px grey",
                                        borderRadius: "8px",
                                        padding: "8px",
                                    }}
                                >
                                    <div
                                        style={{
                                            display: "flex",
                                            justifyContent: "space-between",
                                            borderBottom: "solid 1px grey",
                                        }}
                                    >
                                        <h4
                                            style={{
                                                fontSize: "20px",
                                                marginBottom: "0px",
                                            }}
                                        >
                                            {ea.user.name}
                                        </h4>
                                        {this.props.role === "admin" && (
                                            <DeleteIcon
                                                onClick={() => {
                                                    if (
                                                        window.confirm(
                                                            "Are you sure to delete this comment?"
                                                        )
                                                    ) {
                                                        this.deleteComment(
                                                            ea.id
                                                        );
                                                    }
                                                }}
                                            />
                                        )}
                                    </div>
                                    <div style={{ fontSize: "12px" }}>
                                        {ea.updated_at.substr(0, 10)}
                                    </div>
                                    <div
                                        style={{
                                            fontSize: "20px",
                                        }}
                                    >
                                        {ea.comment}
                                    </div>
                                </div>
                            );
                        })}
                        <FormControl style={{ display: "flex", marginTop: "20px" }}>
                            <Textarea
                                value={this.state.comment}
                                placeholder="Write your comment..."
                                onChange={(e) =>
                                    this.setState({ comment: e.target.value })
                                }
                            />
                            <div
                                style={{
                                    display: "flex",
                                    alignItems: "flex-end",
                                }}
                            >
                            <Button>
                                <EditIcon
                                    onClick={() => {
                                        if (this.props.user_id)
                                            this.addComment();
                                        else {
                                            this.setState({
                                                messageBox: {
                                                    message:
                                                        "Please login to Comment.",
                                                    open: true,
                                                    closeRefresh: false,
                                                },
                                            });
                                        }
                                    }}
                                />
                            </Button>
                            </div>
                        </FormControl>
                    </div>
                </div>
            </Container>
        );
    }

    messageBox() {
        return (
            <Modal
                closeOnDimmerClick={false}
                open={this.state.messageBox.open}
                size="mini"
                style={{ position: "relative", height: "120px" }}
            >
                <ModalOverlay />
                <ModalContent style={{height:"120px", width:"500px", top:"300px"}}>
                    <ModalBody>
                        <p>{this.state.messageBox.message}</p>
                    </ModalBody>
                </ModalContent>
                <ModalFooter>
                    <Button colorScheme='blue' mr={3} 
                        onClick={() => {
                            const refresh = this.state.messageBox.closeRefresh;
                            this.setState({
                                messageBox: {
                                    message: "",
                                    open: false,
                                    closeRefresh: false,
                                },
                            });
                            if (refresh) {
                                this.loadRecipe();
                            }
                        }}
                    >
                        OK
                    </Button>
                </ModalFooter>
            </Modal>
        );
    }

    componentWillMount() {
        this.loadRecipe();
    }

    render() {
        return (
            <div
                onClick={() => {
                    if (this.state.menu) this.setState({ menu: false });
                }}
            >
                <Menu
                    open={this.state.menu}
                    setOpen={(open) => this.setState({ menu: open })}
                    role={this.props.role}
                    currentPage={"Recipe"}
                />
                {this.recipeDetail(this.state.recipe)}
                {this.state.messageBox.open && this.messageBox()}
            </div>
        );
    }
}

if (document.getElementById("recipe")) {
    const recipe_id = document
        .getElementById("recipe")
        .getAttribute("recipe_id");
    const role = document.getElementById("recipe").getAttribute("role");
    const user_id = document.getElementById("recipe").getAttribute("user_id");
    ReactDOM.render(
        <ChakraProvider><Recipe recipe_id={recipe_id} role={role} user_id={user_id} /></ChakraProvider>,
        document.getElementById("recipe")
    );
}
