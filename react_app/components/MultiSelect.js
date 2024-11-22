import Select from "react-select";
const MultiSelect = ({ name = "", options, defaultValue = [], onChange }) => {
	return (
		<Select
			defaultValue={defaultValue}
			isMulti
			name={name}
			options={options}
			className="basic-multi-select"
			classNamePrefix="select"
			onChange={(options) => onChange(name, options)}
		/>
	);
};

export default MultiSelect;
