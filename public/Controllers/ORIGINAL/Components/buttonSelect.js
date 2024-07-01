import React, { useState } from 'react';
import Select, { components } from 'react-select';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faTrashAlt } from '@fortawesome/free-solid-svg-icons';

const options = [
  { value: 'chocolate', label: 'Chocolate' },
  { value: 'strawberry', label: 'Strawberry' },
  { value: 'vanilla', label: 'Vanilla' }
];

const CheckboxOption = ({ data, isSelected, onSelect }) => (
  <div className="custom-option">
    <input
      type="checkbox"
      onChange={() => onSelect(data)}
      checked={isSelected}
    />
    <span>{data.label}</span>
  </div>
);

const CustomOption = (props) => {
  const { data, isSelected, innerRef, innerProps } = props;
  
  return (
    <div ref={innerRef} {...innerProps} className={`custom-select-option ${isSelected ? 'selected' : ''}`}>
      <CheckboxOption
        data={data}
        isSelected={isSelected}
        onSelect={() => {}}
      />
      <FontAwesomeIcon icon={faTrashAlt} className="delete-icon" />
    </div>
  );
};

const CustomSingleValue = ({ children, ...props }) => (
  <components.SingleValue {...props}>
    <span>{children}</span>
  </components.SingleValue>
);

const Login = () => {
  const [selectedOption, setSelectedOption] = useState(null);

  const handleChange = (selectedOption) => {
    setSelectedOption(selectedOption);
  };

  return (
    <Select
      options={options}
      value={selectedOption}
      onChange={handleChange}
      components={{ Option: CustomOption, SingleValue: CustomSingleValue }}
      isMulti
    />
  );
};

export default Login;
