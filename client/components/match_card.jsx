import { Meteor } from 'meteor/meteor';
import React, { Component } from 'react';
import { PropTypes } from 'prop-types';
import './_match_card.scss';

import { Card, Dropdown, ButtonGroup, Button, Modal, Form } from 'react-bootstrap';

class MatchCard extends Component {
  constructor(props) {
    super(props);
    this.showFlagModal = this.showFlagModal.bind(this);
    this.closeFlagModal = this.closeFlagModal.bind(this);
    this.handleChange = this.handleChange.bind(this);
    this.submitFlagModal = this.submitFlagModal.bind(this);
    this.requestMatch = this.requestMatch.bind(this);
    this.selected = this.selected.bind(this);
    this.state = {
      showFlagModal: false,
      flagReason: '',
      requested: false,
      selected: false,
      selectedCounter: 0,
    };
  }
  requestMatch(e) {
    e.preventDefault();
    //TODO: update DB with userID of requester to add to the entry they requested
    this.setState({ requested: true });
  }
  selected(e) {
    e.preventDefault();
    this.props.cardsSelected(this.props.entry);
    setTimeout(() => {
      if (this.props.allowSelection) {
        this.setState({ selected: !this.state.selected });
      }
    }, 0);
  }
  showFlagModal(event) {
    event.preventDefault();
    this.setState({ showFlagModal: true });
  }
  closeFlagModal(event) {
    event.preventDefault();
    this.setState({ showFlagModal: false });
  }
  handleChange(e) {
    this.setState({
      flagReason: e.target.value,
    });
  }
  match(event) {
    event.preventDefault();
  }
  submitFlagModal(e) {
    e.preventDefault();

    const data = {
      userId: Meteor.userId(),
      reason: this.state.flagReason,
      entryId: this.props.entryId,
    };

    this.setState({ showFlagModal: false });
    Meteor.call('entry.flag', data, (error, result) => {
      if (error) {
        this.setState({ error: error.reason, processing: false });
      }
      if (result) {
        this.setState({ processing: false });
      }
    });
  }

  render() {
    const { oneLineIntro, lookingFor, ownCard, timezone, skillHelpOther, skillImproveSelf } = this.props;
    return (
      <React.Fragment>
        <Card id="match_card" onClick={this.selected}>
          <Card.Body className={this.state.selected ? 'selected' : ''}>
            <Card.Title className="font-weight-normal">{oneLineIntro}</Card.Title>
            <Card.Text>{lookingFor}</Card.Text>

            <h3>Skills I can help others with</h3>
            <Card.Text>{skillHelpOther}</Card.Text>

            <h3>Skills I want to improve</h3>
            <Card.Text>{skillImproveSelf}</Card.Text>
            {ownCard === 'true' ? (
              ''
            ) : (
              <Dropdown as={ButtonGroup} className="btn-block">
                <Button className="btn-block" variant="primary" onClick={this.requestMatch}>
                  Request Match
                </Button>

                <Dropdown.Toggle split variant="primary" />

                <Dropdown.Menu>
                  <Dropdown.Item as="button" onClick={this.showFlagModal}>
                    Flag
                  </Dropdown.Item>
                </Dropdown.Menu>
              </Dropdown>
            )}
          </Card.Body>
          <Card.Footer>
            <small className="text-muted">{timezone}</small>
          </Card.Footer>
        </Card>

        <Modal show={this.state.showFlagModal} onHide={this.closeFlagModal}>
          <Form noValidate onSubmit={e => this.submitFlagModal(e)}>
            <Modal.Header closeButton onClick={this.closeFlagModal}>
              <Modal.Title>Why are you flagging this entry?</Modal.Title>
            </Modal.Header>

            <Modal.Body>
              <Form.Group controlId="flagReason">
                <Form.Control
                  type="text"
                  defaultValue={this.state.flagReason}
                  onChange={this.handleChange}
                  placeholder="Enter reason"
                />
              </Form.Group>
            </Modal.Body>

            <Modal.Footer>
              <Button variant="secondary" onClick={this.closeFlagModal}>
                Close
              </Button>
              <Button variant="primary" onClick={this.submitFlagModal}>
                Submit
              </Button>
            </Modal.Footer>
          </Form>
        </Modal>
      </React.Fragment>
    );
  }
}

MatchCard.propTypes = {
  oneLineIntro: PropTypes.string,
  lookingFor: PropTypes.string,
  ownCard: PropTypes.string,
  timezone: PropTypes.string,
  entryId: PropTypes.string,
  skillHelpOther: PropTypes.string,
  skillImproveSelf: PropTypes.string,
  allowSelection: PropTypes.bool,
  cardsSelected: PropTypes.func,
  entry: PropTypes.object,
};

export default MatchCard;
